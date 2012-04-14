<?php

namespace Acme\NotificationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
    		return $this->render('AcmeNotificationsBundle:Default:success.html.twig');
    	}
    	return $this->redirect($this->generateUrl('AcmeHomeBundle_homepage'));
    }
}
