<?php

namespace Acme\NotificationsBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DashController extends Controller
{
    
    public function editAction($id, Request $request)
    {
    	//get the task
    	$user = $this->get('security.context')->getToken()->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$task = $em->getRepository('AcmeTaskBundle:Task')
            		->findOneByUserAndId($id,$user);
      //Notification
		//get notification
		$notification = $em->getRepository('AcmeTaskBundle:Notification')
            		->findOneByTaskId($task->getId());
      if($notification && !$notification->getNotified()){
      	$datetime = $notification->getDateTime();
      	$notification->setDateTime(date('j-n-Y g:ia', $datetime));
      	$notification_form = $this->createFormBuilder($notification)
      								->add('datetime','text')
      								->add('prepare','text',array('label' => 'Time to prepare'))
      								->add('travelTime','text',array('label' => 'Travel Time'))
      								//->add('WCondition')
      								->getForm();
      } else {
      	return $this->redirect($this->generateUrl('AcmeDashBundle_ajax_panel'));
      }   
      //save?
      if ($request->getMethod() == 'POST') 
		{
			$notification_form->bindRequest($request);
			//set datetime
			$notification_form->getData()->setDateTime(strtotime($notification_form->getData()->getDateTime()));
			//is valid
			if ($notification_form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($notification);
				$em->flush();
				$this->get('session')->setFlash('success', 'Your changes were saved!');
        		return $this->redirect($this->generateUrl('AcmeDashBundle_ajax_panel'));
        	}
		}
		return $this->render('AcmeNotificationsBundle:Dash:edit.html.twig', array('id' => $id, 'notification_form' => $notification_form->createView()));
    }
}
