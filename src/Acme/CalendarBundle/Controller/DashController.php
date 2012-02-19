<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Entity\CalendarShare;
use Acme\CalendarBundle\Library\Sync;

class DashController extends Controller
{
    
	public function listAction() {
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//retrive the users calendars
		$calendars = 	$this->getDoctrine()
							->getRepository('AcmeTaskBundle:Calendar')
							->findByOwnerId($user->getId());
		//facebook link
		$sync = new Sync($this->getDoctrine()->getEntityManager());
		$facebook = $sync->facebook($user); 
		return $this->render('AcmeCalendarBundle:Dash:calendars.html.twig',array('calendars' => $calendars, 'facebook' => $facebook));
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
	
	public function shareAction($id, Request $request)
	{
		//get the task list from db
		$user = $this->get('security.context')->getToken()->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$calendar = $em->getRepository('AcmeTaskBundle:Calendar')
						->findOneById($id);
		$calendarshare = new CalendarShare();
      
		$form = $this->createFormBuilder($calendarshare)
					->add("username")
					->add("description")
					->add("calendarId","hidden", array( 'attr' => array('value' => $id)))
					->getForm();
		//save?
		if ($request->getMethod() == 'POST') 
		{
			$post = $request->request->get('form');
			$form->bindRequest($request);
			if ($form->isValid()) {
				//check for the user
				$user = $em->getRepository('AcmeUserBundle:User')
						->findOneByUsername($post['username']);
				if(count($user)>0){
					$em = $this->getDoctrine()->getEntityManager();
					$em->persist($calendarshare);
					$em->flush();
					//set message
					$this->get('session')->setFlash('success', 'Your Calendar is shared and waiting for acceptances!');
					//send response
					return $this->redirect($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
				} else {
					$this->get('session')->setFlash('error', 'Invalid Username!');
				}
			}
		}  
			return $this->render('AcmeCalendarBundle:Dash:share.html.twig', array('id' => $id, 'title' => $calendar->getTitle(), 'form' => $form->createView()));
	}
}