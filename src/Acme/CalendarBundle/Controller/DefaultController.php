<?php

namespace Acme\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\CalendarBundle\Entity\Calendar;

class DefaultController extends Controller
{
    
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
				$response = new Response(json_encode(array('response' => 'success','message' => 'Calendar Added!!')));
			} else {
				$response = new Response(json_encode(array('response' => 'error')));
			}
		}
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
    
    function tickCalendarAction($id) {
    	if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
    	//get calendar by id
    	$calendar = $this->getDoctrine()
        ->getRepository('AcmeCalendarBundle:Calendar')
        ->findOneById($id);
      //enable or disable
      if($calendar->getEnabled() == 0){
      	$calendar->setEnabled(1);
      }else {
      	$calendar->setEnabled(0);
      }
    	$em = $this->getDoctrine()->getEntityManager();
				$em->persist($calendar);
				$em->flush();
   	$response = new Response(json_encode(array('response' => 'success')));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
    //delete a calendar
    function deleteCalendarAction($id) {
    	if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
    	//get calendar by id
    	$calendar = $this->getDoctrine()
        ->getRepository('AcmeCalendarBundle:Calendar')
        ->findOneById($id);
    	$em = $this->getDoctrine()->getEntityManager();
				$em->remove($calendar);
				$em->flush();
   	$response = new Response(json_encode(array('response' => 'success')));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
}