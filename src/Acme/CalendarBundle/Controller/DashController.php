<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Entity\Calendar;

class DashController extends Controller
{
    
	public function listAction() {
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//retrive the users calendars
		$calendars = $this->getDoctrine()
		->getRepository('AcmeTaskBundle:Calendar')
		->findByOwnerId($user->getId());
		return $this->render('AcmeCalendarBundle:Dash:calendars.html.twig',array('calendars' => $calendars));
	}
	
	public function editAction($id, Request $request)
	{
		//get the task list from db
		$user = $this->get('security.context')->getToken()->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$calendar = $em->getRepository('AcmeTaskBundle:Calendar')
						->findOneById($id);
        
		$form = $this->createFormBuilder($calendar)
					->add("title")
					->add("enabled",null,array('required' => false))
					->add("description")
					->add("privacyType",'choice', array(
		 				'choices'   => array('private' => 'Private', 'public' => 'Public','shared' => "Shared")
						))
					->getForm();
		//save?
		if ($request->getMethod() == 'POST') 
		{
			$form->bindRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($calendar);
				$em->flush();
				//set message
				$this->get('session')->setFlash('success', 'Calendar changes are saved!');
				//send response
				return $this->redirect($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
			}
		}  
			return $this->render('AcmeCalendarBundle:Dash:edit.html.twig', array('id' => $id, 'form' => $form->createView()));
	}
}