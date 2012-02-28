<?php

namespace Acme\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\LearningBundle\Entity\LearnTravel;

class TravelController extends Controller
{
    
    public function learnAction()
    {
        return $this->render('AcmeLearningBundle:Travel:index.html.twig');
    }
    public function saveAction(Request $request) {
    	//get the user id
		$user = $this->get('security.context')->getToken()->getUser();
		//create form
		$LearnTravel = new LearnTravel();
		//
		$form = $this->createFormBuilder($LearnTravel, array('csrf_protection' => false))
					->add("userId",'hidden')
					->add("route")
					->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			$form->getData()->setUserId($user->getId());
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($LearnTravel);
				$em->flush();
				// perform some action, such as saving the task to the database
				$this->get('session')->setFlash('success', 'Your travel data is saved!');
				return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
			} else {
				$this->get('session')->setFlash('error', 'Error saving the travel data!');
			}
		}
		return $this->redirect($this->generateUrl('AcmeLearningBundle_homepage'));
    }
}
