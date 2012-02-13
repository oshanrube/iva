<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Library\Decode;

class CalendarController extends Controller
{
    
	public function listAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		if($user == 'anon.')
			return $this->render('AcmeMobileBundle:Default:login.html.twig');
		
		//list all the calendars
		$user = $this->get('security.context')->getToken()->getUser();
		$calendarlist = $this->getDoctrine()
		        ->getRepository('AcmeTaskBundle:Calendar')
		        ->findByOwnerId($user->getId());
		
		return $this->render('AcmeMobileBundle:Calendar:list.html.twig',
		array('calendarlist' => $calendarlist));	
	}
	public function browseAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		if($user == 'anon.')
			return $this->render('AcmeMobileBundle:Default:login.html.twig');
		
		//list all the calendars
		$user = $this->get('security.context')->getToken()->getUser();
		$calendarlist = $this->getDoctrine()
		        ->getRepository('AcmeTaskBundle:Calendar')
		        ->findByOwnerIdandEnabled($user);
		
		return $this->render('AcmeMobileBundle:Calendar:browse.html.twig',
		array('calendarlist' => $calendarlist));	
	}
	public function viewCalendarAction($id,$year,$month) {
		//date
		if(!$month || $month<1 || $month>12)$month = date('m');
		if(!$year || $year<1996)$year = date('Y'); 
		//date
		$date['month'] = date('F',mktime(0, 0, 0, $month, 1, $year));
		$date['year'] = $year;
		//nav
		$nav['id'] = $id;
		$nav['prev']['month'] = date('m',strtotime('-1 month', mktime(0, 0, 0, $month, 1, $year)));
		$nav['prev']['year'] = date('Y',strtotime('-1 month', mktime(0, 0, 0, $month, 1, $year)));
		$nav['nxt']['month'] = date('m',strtotime('+1 month', mktime(0, 0, 0, $month, 1, $year)));
		$nav['nxt']['year'] = date('Y',strtotime('+1 month', mktime(0, 0, 0, $month, 1, $year)));
		//get tasks
		$Task = $this->getDoctrine()->getRepository('AcmeTaskBundle:Task');
		$user = $this->get('security.context')->getToken()->getUser();
		$timeline = $Task->findByCalendarMonth($user,$year,$month,$id);
		$timeline = Decode::getCalendar($timeline,$year,$month);
		//		
    	$timestamp = mktime(0, 0, 0, $month, 1, $year);
    	return $this->render('AcmeMobileBundle:Calendar:view.html.twig',array('timestamp' => $timestamp,'timeline' => $timeline,'date' => $date,'nav' => $nav));
	}
	public function editCalendarAction($id, Request $request)
	{
		$user = $this->get('security.context')->getToken()->getUser();
		if($user == 'anon.')
			return $this->render('AcmeMobileBundle:Default:login.html.twig');
		
		//load the calendars
		$Calendar = $this->getDoctrine()->getRepository('AcmeTaskBundle:Calendar');
		$user = $this->get('security.context')->getToken()->getUser();
		$calendar = $Calendar->findOneById($id);
		$form = $this->createFormBuilder($calendar)
				->add("title")
				->add("enabled",null,array('required' => false))
				->add("description")
				->add("privacyType",'choice', array(
					'choices'   => array('private' => 'Private', 'public' => 'Public','shared' => "Shared")
					))
				->getForm();
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			if ($form->isValid()) {
				// perform some action, such as saving the task to the database
				$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($calendar);
    			$em->flush();
    			//set flash
    			$this->get('session')->setFlash('success', $calendar->getTitle().' is saved!');
    			//response
				return $this->redirect($this->generateUrl('AcmeMobileBundle_manageCalendars'));
			}
		}
		return $this->render('AcmeMobileBundle:Calendar:form.html.twig',
		array('form' => $form->createView(),'id' => $id));	
	}
}
