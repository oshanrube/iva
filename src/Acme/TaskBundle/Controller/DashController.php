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
use Acme\TaskBundle\Entity\Notification;
use Acme\TaskBundle\Form\TaskType;

class DashController extends Controller
{

	public function editAction($id, Request $request)
	{
		//get the task list from db
		$user = $this->get('security.context')->getToken()->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$task = $em->getRepository('AcmeTaskBundle:Task')
            		->findOneByUserAndId($id,$user);
      $calendars = $em->getRepository('AcmeTaskBundle:Calendar')
            		->findByUser($user);
      $taskTypes = $em->getRepository('AcmeTaskBundle:TaskType')
            		->findAll();
      $tasktypes = array( 0 => '--Select--' );
    	foreach($taskTypes as $tasktype){
    		$tasktypes[$tasktype->getId()] = $tasktype->getTitle();
    	}
    	$taskColours = $em->getRepository('AcmeTaskBundle:TaskColour')
            		->findAll();
		$taskcolours = array( 0 => '--Select--' );
    	foreach($taskColours as $taskColour){
    		$taskcolours[$taskColour->getId()] = $taskColour->getColour();
    	}
    	$TaskPrioritys = $em->getRepository('AcmeTaskBundle:TaskPriority')
            		->findAll();
		$taskprioritys = array( 0 => '--Select--' );
    	foreach($TaskPrioritys as $TaskPriority){
    		$taskprioritys[$TaskPriority->getId()] = $TaskPriority->getDescription();
    	}
    	//set
    	$startTime = $task->getStartTime();
    	$endTime = $task->getEndTime();
    	$task->setStartTime(date('j-n-Y g:ia', $startTime));
    	$task->setEndTime(date('j-n-Y g:ia', $endTime));
    	//var_dump(); 
    	//
      $form = $this->createFormBuilder($task)
      			->add('userId','hidden')
            	->add('task')
            	->add('description')
            	->add('startTime', 'text', array( 'label'  => 'Start Time'))
            	->add('endTime', 'text', array( 'label'  => 'End Time'))
            	->add('location', 'text')            	
            	->add('lng','text', array( 'label'  => 'Longitude'))
            	->add('lat','text', array( 'label'  => 'Latitude'))
      			->add('calendarId', 'choice', array( 'label'  => 'Task Calendar', 'choices' => $calendars ))
      			->add('taskTypeId', 'choice', array( 'label'  => 'Task Type', 'choices' => $tasktypes , 'attr' => array('onchange' => 'checkAllDay(this)' )))
      			->add('taskColourId', 'choice', array( 'label'  => 'Task Colour', 'choices' => $taskcolours ))
      			->add('taskPriorityId', 'choice', array( 'label'  => 'Task Priority Level', 'choices' => $taskprioritys ))
					->getForm();					
		//Notification
		//get notification
		$notification = $em->getRepository('AcmeTaskBundle:Notification')
            		->findOneByTaskId($task->getId());
      if($notification && !$notification->getNotified()){
      	$datetime = $notification->getDateTime();
      } else {
      	$notification = new Notification();
      }
      //save?
      if ($request->getMethod() == 'POST') 
		{
			$form->bindRequest($request);
			//set datetime
			$form->getData()->setStartTime(strtotime($form->getData()->getStartTime()));
			$form->getData()->setEndTime(strtotime($form->getData()->getEndTime()));
			//is valid
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($task);
				$em->flush();
				$this->get('session')->setFlash('success', 'Your changes were saved!');
        		return $this->redirect($this->generateUrl('AcmeDashBundle_ajax_panel'));
        	}
		}  
			return $this->render('AcmeTaskBundle:Dash:edit.html.twig', array('id' => $id, 'form' => $form->createView(),'notification' => $notification));
	}
}