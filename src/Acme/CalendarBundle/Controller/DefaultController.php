<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Entity\Calendar;
use Acme\CalendarBundle\Library\Sync;
use Acme\ScheduleBundle\Entity\Schedule;

class DefaultController extends Controller
{
    
    public function userCalendarsAction() {
    	//get the user id
    	$user = $this->get('security.context')->getToken()->getUser();
    	//retrive the users calendars
		$calendars = $this->getDoctrine()
        ->getRepository('AcmeTaskBundle:Calendar')
        ->findByOwnerId($user->getId());
    	return $this->render('AcmeCalendarBundle:Default:calendarWidget.html.php',array('calendars' => $calendars));
    	
    }
    public function addNewCalendarAction(Request $request) {
    	$calendar = new calendar();
    	//get the user id
    	$user = $this->get('security.context')->getToken()->getUser();
    	$calendar->setOwnerId($user->getId());
    	//create form
		$form = $this->createFormBuilder($calendar)
			->add("title")
			->add("enabled",null,array('required' => false))
			->add("description")
			->add("privacyType",'choice', array(
 				'choices'   => array('private' => 'Private', 'public' => 'Public','shared' => "Shared")
				))
         ->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($calendar);
				$em->flush();
				// perform some action, such as saving the task to the database
				$response = new Response(json_encode(array('response' => 'success','message' => 'Calendar Added!!')));
			} else {
				$response = new Response(json_encode(array('response' => 'error')));
			}
		}
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
    
    function tickCalendarAction($id) {
    	if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
    	//get calendar by id
    	$calendar = $this->getDoctrine()
        ->getRepository('AcmeTaskBundle:Calendar')
        ->findOneById($id);
      //enable or disable
      if($calendar->getEnabled() == 0){
      	$calendar->setEnabled(1);
      }else {
      	$calendar->setEnabled(0);
      }
    	$em = $this->getDoctrine()->getEntityManager();
				$em->persist($calendar);
				$em->flush();
   	$response = new Response(json_encode(array('response' => 'success')));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
    
    //delete a calendar
    function deleteCalendarAction(Request $request,$id) {
    	if(!$this->getRequest()->isXmlHttpRequest() && $request->getMethod() != 'POST'){
			return $this->redirect($this->generateUrl('error'));
		}
		$em = $this->getDoctrine()->getEntityManager();
    	//get calendar by id
    	$calendar = $this->getDoctrine()
        			->getRepository('AcmeTaskBundle:Calendar')
        			->findOneById($id);
      //get events
      $events = $this->getDoctrine()
        			->getRepository('AcmeTaskBundle:Task')
        			->findByCalendarId($calendar->getId());
      if($events){
      	foreach($events as $event){
      		$notification = $this->getDoctrine()
      					->getRepository('AcmeTaskBundle:Notification')
            			->findOneByTaskId($event->getId());
      		$em->remove($notification);
				$em->remove($event);	
      	}
      }
				$em->remove($calendar);
				$em->flush();
		if($this->getRequest()->isXmlHttpRequest()){
   		$response = new Response(json_encode(array('response' => 'success')));
			$response->headers->set('Content-Type', 'application/json');
			return $response;
		} else {
			return $this->redirect($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
		}
    }
    //sync with facebook
    public function syncFacebookAction() {
    	//get user
    	$user = $this->get('security.context')->getToken()->getUser();
    	//shedule a update
		$schedule = new Schedule();
		$schedule->setDatetime(time());
		$schedule->setCommand('calendar:syncfacebook');
		$schedule->setArguments('username:'.$user->getUsername());
		// saving the task to the database
		$em = $this->getDoctrine()->getEntityManager(); 
		$em->persist($schedule);
		$em->flush();
		//set flash
		$this->get('session')->setFlash('success', 'Your facebook events are sheduled to be synced with IVA!');
		//redirect
		return $this->redirect($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
    }
}










