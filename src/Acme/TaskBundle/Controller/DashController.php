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
            	->add('startTime', 'text')
            	->add('endTime', 'text')
            	->add('location', 'hidden')
            	->add('lng','hidden')
            	->add('lat','hidden')
      			->add('calendarId', 'choice', array( 'choices' => $calendars ))
      			->add('taskTypeId', 'choice', array( 'choices' => $tasktypes , 'attr' => array('onchange' => 'checkAllDay(this)' )))
					->getForm();					
		//Notification
		//get notification
		$notification = $em->getRepository('AcmeTaskBundle:Notification')
            		->findOneByTaskId($task->getId());
      if($notification){
      	$notification_form = $this->createFormBuilder($notification)
      								->add('datetime','text')
      								->getForm()
      								->createView();
      } else {
      	$notification_form = '';
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
        		return $this->redirect($this->generateUrl('AcmeDashBundle_ajax_panel'));
        	}
		}  
			return $this->render('AcmeTaskBundle:Dash:edit.html.twig', array('id' => $id, 'form' => $form->createView(),'notification_form' => $notification_form));
	}
}