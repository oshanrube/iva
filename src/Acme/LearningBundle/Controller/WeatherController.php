<?php

namespace Acme\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\WeatherBundle\Entity\WCondition;
use Acme\LearningBundle\Entity\LearnWeatherCondition;

class WeatherController extends Controller
{
	public function listWeatherAction()
	{
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//retrive the weather conditions
		$wconditions = 	$this->getDoctrine()
							->getRepository('AcmeWeatherBundle:WCondition')
							->findAll();
		return $this->render('AcmeLearningBundle:Weather:list.html.twig' , array( 'wconditions' => $wconditions ));
	}
	public function addWeatherAction($id,Request $request) {
		//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//select the weather condition
		$wcondition = 	$this->getDoctrine()
							->getRepository('AcmeWeatherBundle:WCondition')
							->findById($id);
		//if id not found
		if(!$wcondition){
			$this->get('session')->setFlash('error', 'Invalid weather Id!');
			return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
		}
		$wCondition = new LearnWeatherCondition();
		//create form
		$form = $this->createFormBuilder($wCondition)
					->add("userId",'hidden')
					->add("wConditionId",'hidden')
					->add("city")
					->add("lng")
					->add("lat")
					->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			$form->getData()->setUserId($user->getId());
			$form->getData()->setWConditionId($id);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($wCondition);
				$em->flush();
				// perform some action, such as saving the task to the database
				$this->get('session')->setFlash('success', 'Your current weather is saved!');
				return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
			} else {
				$this->get('session')->setFlash('error', 'Error saving the weather!');
			}
		}
		return $this->render('AcmeLearningBundle:Weather:add.html.twig', array( 'id' => $id , 'form' => $form->createView()));
	}
}
