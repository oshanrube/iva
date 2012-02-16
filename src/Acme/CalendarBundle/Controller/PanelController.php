<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Library\Decode;

class PanelController extends Controller
{
    public function ajaxMonthAction($year,$month,$nav) {
    	if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
    	if($nav == 'nextMonth')$month++;
    	elseif($nav == 'prevMonth') $month--;
		elseif($nav == 'nextYear') $year++;
		elseif($nav == 'prevYear') $year--;
		//get tasks
		$Task = $this->getDoctrine()->getRepository('AcmeTaskBundle:Task');
		$user = $this->get('security.context')->getToken()->getUser();
		$timeline = $Task->findByThisMonth($user,$year,$month);
		$timeline = Decode::getCalendar($timeline,$year,$month);
		//
    	$timestamp = mktime(0,0,0,$month,1,$year);
    	$templating = $this->get('templating');
    	$page = $templating->render('AcmeCalendarBundle:Panel:month.html.php',array('timestamp' => $timestamp,'timeline' => $timeline));
			
    	$response = new Response(json_encode(array('page' => $page,'month' => date('m',$timestamp),'year' => date('Y',$timestamp),'mon' => date('F',$timestamp))));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
   }
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
		        ->getRepository('AcmeTaskBundle:Calendar')
		        ->findByOwnerId($user->getId());
			$panel = $templating->render('AcmeCalendarBundle:Panel:myCalendars.html.twig',array('calendars' => $calendars));
		} else {$panel='';}
    	$response = new Response(json_encode(array('page' => $panel,'current' => $current)));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
}