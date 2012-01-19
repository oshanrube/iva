<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\CalendarBundle\Entity\Calendar;

class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeCalendarBundle:Default:index.html.twig', array('name' => $name));
    }
    public function userCalendarsAction() {
    	//get the user id
    	$user = $this->get('security.context')->getToken()->getUser();
    	//retrive the users calendars
		$calendars = $this->getDoctrine()
        ->getRepository('AcmeCalendarBundle:Calendar')
        ->findByOwnerId($user->getId());
    	return $this->render('AcmeCalendarBundle:Default:calendarWidget.html.php',array('calendars' => $calendars));
    	
    }
    public function addNewCalendarAction(Request $request) {
    	$calendar = new calendar();
    	//get the user id
    	$user = $this->get('security.context')->getToken()->getUser();
    	$calendar->setOwnerId($user->getId());
    	//create form
		$form = $this->createFormBuilder($calendar)
			->add("title")
			->add("enabled",null,array('required' => false))
			->add("description")
			->add("privacyType",'choice', array(
 				'choices'   => array('private' => 'Private', 'public' => 'Public','shared' => "Shared")
				))
         ->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($calendar);
				$em->flush();
				// perform some action, such as saving the task to the database
				$response = new Response(json_encode(array('success' => true)));
			} else {
				$response = new Response(json_encode(array('success' => false)));
			}
		}
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
    public function ajaxMonthAction($year,$month,$nav) {
    	if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
    	if($nav == 'nextMonth')$month++;
    	elseif($nav == 'prevMonth') $month--;
		elseif($nav == 'nextYear') $year++;
		elseif($nav == 'prevYear') $year--;
		
    	$timestamp = mktime(0,0,0,$month,1,$year);
    	$templating = $this->get('templating');
    	$page = $templating->render('AcmeCalendarBundle:Default:month.html.php',array('timestamp' => $timestamp));

    	$response = new Response(json_encode(array('page' => $page,'month' => date('m',$timestamp),'year' => date('Y',$timestamp),'mon' => date('F',$timestamp))));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
}
