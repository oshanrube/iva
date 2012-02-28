<?php

namespace Acme\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\LearningBundle\Entity\LearnUserLocation;

class LocationController extends Controller
{
	public function listLocationsAction()
	{
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//retrive the users calendars
		$locations = 	$this->getDoctrine()
							->getRepository('AcmeLearningBundle:LearnUserLocation')
							->findByOwnerId($user->getId());
		$mylocations = 	$this->getDoctrine()
							->getRepository('AcmeLearningBundle:LearnUserLocation')
							->findByUserId($user->getId());
		return $this->render('AcmeLearningBundle:Location:locationList.html.twig' , array( 'locations' => $locations , 'mylocations' => $mylocations ));
	}
	public function addLocationAction($title,Request $request) {
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//create the new location
		$location = new LearnUserLocation();
		$location->setTitle($title);
		//create form
		$form = $this->createFormBuilder($location)
					->add("userId",'hidden')
					->add("title")
					->add("description",null, array('required' => false))
					->add("lng")
					->add("lat")
					->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			$form->getData()->setUserId($user->getId());
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($location);
				$em->flush();
				// perform some action, such as saving the task to the database
				$this->get('session')->setFlash('success', 'Your location is saved!');
				return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
			} else {
				$this->get('session')->setFlash('success', 'Error saving the location!');
			}
		}
		return $this->render('AcmeLearningBundle:Location:locationAdd.html.twig', array('form' => $form->createView()));
	}
	public function editLocationAction($id,Request $request) {
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//create the new location
		$location = 	$this->getDoctrine()
							->getRepository('AcmeLearningBundle:LearnUserLocation')
							->findById($id);
		//if id not found
		if(!$location){
			$this->get('session')->setFlash('error', 'Invalid location Id!');
			return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
		}
		//create form
		$form = $this->createFormBuilder($location)
					->add("userId",'hidden')
					->add("title")
					->add("description",null, array('required' => false))
					->add("lng")
					->add("lat")
					->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			//delete? 
			if($request->request->get('action') == 'delete'){
				$em->remove($location);
				$em->flush();
				$this->get('session')->setFlash('success', 'Successfully deleted the location!');
				return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
			}
			$form->getData()->setUserId($user->getId());
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($location);
				$em->flush();
				// perform some action, such as saving the task to the database
				$this->get('session')->setFlash('success', 'Your location is saved!');
				return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
			} else {
				$this->get('session')->setFlash('success', 'Error saving the location!');
			}
		}
		return $this->render('AcmeLearningBundle:Location:locationEdit.html.twig', array( 'id' => $id , 'form' => $form->createView()));
	}
}
