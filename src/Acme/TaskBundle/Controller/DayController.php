<?php

namespace Acme\TaskBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Library\Decode;
use Acme\TaskBundle\Library\Language;
use Acme\TaskBundle\Library\Location;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Form\TaskType;

class DayController extends Controller
{

	public function editAction($id, Request $request)
	{
		//get the task list from db
		$user = $this->get('security.context')->getToken()->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$task = $em->getRepository('AcmeTaskBundle:Task')
            		->findOneByDay($id,$user);
      $calendars = $em->getRepository('AcmeTaskBundle:Calendar')
            		->findByUser($user);
        
      $form = $this->createFormBuilder($task)
      			->add('userId','hidden')
            	->add('task')
            	->add('description')
            	->add('datetime','hidden')
            	->add('location','hidden')
            	->add('lng','hidden')
            	->add('lat','hidden')
      			->add('calendarId', 'choice', array( 'choices' => $calendars ))
					->getForm();
      //save?
      if ($request->getMethod() == 'POST') 
		{
			$form->bindRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($task);
				$em->flush();
        		return $this->redirect($this->generateUrl('AcmeDashBundle_ajax_panel'));
        	}
		}  
			return $this->render('AcmeTaskBundle:Day:edit.html.twig', array('id' => $id, 'form' => $form->createView()));
	}
	public function AddNewTaskAction(Request $request)
	{
		//array
		$suggestions = array();
		// create a task and give it some dummy data for this example
		$task = new Task();
		//create form
		$form = $this->createFormBuilder($task)
					->add('task')
					->getForm();
		if ($request->getMethod() == 'POST' && $this->getRequest()->isXmlHttpRequest()) 
		{	
			//flag variable initialize
			$error=false;
			$quickTask = $request->request->get('task');
			$lng = $request->request->get('lng');
			$lat = $request->request->get('lat');
			$locId = $request->request->get('loc_id');
			$quickTask = Language::improveSentence($quickTask); 
			//get time
			$datetime = Decode::getDateTime($quickTask);
			if($datetime == 0){
				//flag error
				$error = true;
				$this->get('session')->setFlash('question', 'Hey system couldnt figure out the "when" part(Time), please help out!!');
			} else {
				$task->setDatetime($datetime);
			}
			//get location
			//check for location id
			if($locId != ''){
				$location = new Location();
				$taskLocation = $location->getLocation($locId);
				//set location
				$task->setLocation($taskLocation->name);
				$task->setLng($taskLocation->location->lng);
				$task->setLat($taskLocation->location->lat);
				//search for locations in the text
			} elseif($locations = Language::getEasyLocation($quickTask)) {
				if(!$lng || !$lat){
					//$this->get('session')->setFlash('question', 'Hey system needs your location to process accurate data!!');
					if($_SERVER['REMOTE_ADDR'] == '192.168.1.100'){$_SERVER['REMOTE_ADDR'] ='112.134.98.178'; }
					$rec = geoip_record_by_name ($_SERVER['REMOTE_ADDR']);
					$lng = $rec["longitude"];
					$lat = $rec["latitude"];
					$accurate=false;
				} else {$accurate=true;}
				//search the locations list and get alternative sentences
				$location = new Location();
				if(!$taskLocation = $location->searchLocation($quickTask,$locations,$lng,$lat,$accurate)){
					//improve 
					$sentences = $location->improveSentence();
					//add to suggetions
					$suggestions = array_merge($suggestions,$sentences);
					//add Venues
					$venues = $location->getVenues();
					$error = true;
				} else {
					$task->setLocation($taskLocation->name);
					$task->setLng($taskLocation->location->lng);
					$task->setLat($taskLocation->location->lat); 
				}
			} else {
				$this->get('session')->setFlash('question', 'Hey system couldnt figure out the "Where" part(Location), please help out!!');
			}
			//calendar
			if($calendarName = Decode::getCalendarName($quickTask)){
				$user = $this->get('security.context')->getToken()->getUser();
				$em = $this->getDoctrine()->getEntityManager();
				$calendar = $em->getRepository('AcmeTaskBundle:Calendar')
            ->findOneByCalendarName($calendarName,$user);
            $calendarId = $calendar[0]->getId();
            $task->setCalendarId($calendarId);
			} else {
				$task->setCalendarId(0);
			}
			//task
			if(!$error){
				$CleanedTask = Language::removePronouns($quickTask);
				$CleanedTask = Decode::removeTime($CleanedTask);
				$CleanedTask = Decode::removeLocation($CleanedTask,$taskLocation->name);
				if(!$tsk = Decode::getTask($CleanedTask)){
					$this->get('session')->setFlash('question', 'Hey system couldnt figure out the "What" part(Task), please help out!!');
					$error=true;
				} else {
					//add the task
					$task->setTask($tsk);
					//create description
					$desc = Language::CreateDescription($task);
					$task->setDescription($desc);
				}
			}
			//End
			if(!$error){
				// saving the task to the database 
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($task);
				$em->flush();
				//send response
				$response = new Response(json_encode(array( 'response' => 'success','message' => $task->getDescription().', Got It!!' )));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			} else {
				//load task
				$task->setTask($request->request->get('task'));
				$suggestions = "'".implode("','",$suggestions)."'";
				if($request->request->get('task') == $quickTask){
					$quickTask = '';
				}
				if( !isset($venues) ){$venues = array();}
				//generate the panel
				$templating = $this->get('templating');
				$panel = $templating->render('AcmeTaskBundle:Panel:new.html.twig', array('form' => $form->createView(),'task' => $task,'didyoumean' => $quickTask,'suggestions' => $suggestions,'venues' => $venues));
				//send response
				$response = new Response(json_encode(array( 'response' => 'reload','html' => $panel )));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}
		}
		return $this->render('AcmeTaskBundle:Panel:new.html.twig', 
		array('form' => $form->createView(),'task' => $task,'didyoumean' => '')
		);
	}
}