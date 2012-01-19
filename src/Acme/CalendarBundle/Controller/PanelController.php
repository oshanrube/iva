<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\CalendarBundle\Entity\Calendar;

class PanelController extends Controller
{
	public function ajaxPanelAction($current,$nav) {
		if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
		$calendarPanelOptions = array('mycalendars','newcalendar');
		$key = array_search($current, $calendarPanelOptions);
		if($nav == "next"){
			while (current($calendarPanelOptions) !== $current) next($calendarPanelOptions); // Advance until there's a match
			if(!$current = next($calendarPanelOptions)) $current = $calendarPanelOptions[0];
		} elseif($nav == "prev") {
			while (current($calendarPanelOptions) !== $current) next($calendarPanelOptions);
			if(!$current = prev($calendarPanelOptions)) $current = end($calendarPanelOptions);
		}
		//generate the panel 
		$templating = $this->get('templating');
		//if it requests new calenday generate the form
		if($current == "newcalendar"){
			$calendar = new calendar();
			$form = $this->createFormBuilder($calendar)
				->add("title")
				->add("enabled",null,array('required' => false))
				->add("description")
				->add("privacyType",'choice', array(
    				'choices'   => array('private' => 'Private', 'public' => 'Public','shared' => "Shared")
					))
            ->getForm();
    		$panel = $templating->render('AcmeCalendarBundle:Panel:newCalendar.html.twig', array(
            'form' => $form->createView(),
        ));
       } elseif($current == 'mycalendars') {
       		//get the user id
		    	$user = $this->get('security.context')->getToken()->getUser();
		    	//retrive the users calendars
				$calendars = $this->getDoctrine()
		        ->getRepository('AcmeCalendarBundle:Calendar')
		        ->findByOwnerId($user->getId());
			$panel = $templating->render('AcmeCalendarBundle:Panel:myCalendars.html.twig',array('calendars' => $calendars));
		} else {$panel='';}
    	$response = new Response('Hello ', 200);
    	$response = new Response(json_encode(array('page' => $panel,'current' => $current)));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
}