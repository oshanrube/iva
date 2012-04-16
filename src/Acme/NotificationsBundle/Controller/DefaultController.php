<?php

namespace Acme\NotificationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
include __DIR__.'/../Library/Twilio.php';

class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeNotificationsBundle:Default:index.html.twig', array('name' => $name));
    }
    public function confirmPushAction(Request $request){
    	    	
    	if ($request->getMethod() == 'POST') 
		{
			$id = $request->request->get('id');
			//Notification
			//get notification
			$em = $this->getDoctrine()->getEntityManager();
			$notification = $em->getRepository('AcmeTaskBundle:Notification')
            				->findOneById($id);
         if(!$notification)
         	return $this->redirect($this->generateUrl('AcmeHomeBundle_homepage'));
         $notification->setPush(true);
         $em = $this->getDoctrine()->getEntityManager();
			$em->persist($notification);
			$em->flush();
			echo $notification->getId();
    		return $this->render('AcmeNotificationsBundle:Default:success.html.twig');
    	}
    	return $this->redirect($this->generateUrl('AcmeHomeBundle_homepage'));
    }
    public function callDetailsAction(Request $request, $id, $confirmId){
    	 
		//Notification
		//get notification
		$em 				= $this->getDoctrine()->getEntityManager();
		$notification 	= $em->getRepository('AcmeTaskBundle:Notification')
         					->findOneByIdAndConfirmId($id, $confirmId);
		//if invalid id or confirm id
      if(!$notification)
      	return $this->redirect($this->generateUrl('AcmeHomeBundle_homepage'));
      $userId			= $notification->getTask()->getUserId();
    	$user 			= $em->getRepository('AcmeUserBundle:User')
      						->findOneById($userId);
      //create message
      $message = $notification->getTask()->getDescription().' At '.date("g:i:s a",$notification->getTask()->getStartTime()).' in '.$notification->getTask()->getLocation();
      //twiml respose
      
      //$response = new Twiml();
      $response = new \Services_Twilio_Twiml();
		$response->say("Hi this IVA calling, can you please follow the following message to ".$user->getName());
		$response->say($message,  array('voice' => 'man','loop' => 2));
		$response->hangup();
      //
 		//$content = $this->render('AcmeNotificationsBundle:Default:success.html.twig', array( 'notification' => $notification));
 		$response = new Response($response);
		$response->headers->set('Content-Type', 'text/xml');
		return $response;
    }
}
