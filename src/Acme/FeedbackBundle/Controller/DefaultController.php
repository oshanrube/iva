<?php

namespace Acme\FeedbackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\FeedbackBundle\Entity\Feedback;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function getFeedbackAction()
    {	
    	// create a feedback form
		$feedback = new Feedback();
		//create form
		$form = $this->createFormBuilder($feedback)
					->add('description')
					->getForm();
        return $this->render('AcmeFeedbackBundle:Default:index.html.twig',array('form' => $form->createView()));
    }
    public function addAction(Request $request)
    {
		if ($request->getMethod() == 'POST' && $this->getRequest()->isXmlHttpRequest()) 
		{	
			$user = $this->get('security.context')->getToken()->getUser();
			$feedback = new Feedback();
			$feedback->setUserId($user->getId());
			//create form
			$form = $this->createFormBuilder($feedback)
					->add('description')
					->getForm();
			$form->bindRequest($request);
			if ($form->isValid()) {
				//flag variable initialize
				$em = $this->getDoctrine()->getEntityManager();		
				$em->persist($feedback);
				$em->flush();
				//send response
				$response = new Response(json_encode(array( 'response' => 'success','message' => 'Thank you for your feedback' )));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}
      }
      $response = new Response(json_encode(array( 'response' => 'error','message' => 'Error in request' )));
		$response->headers->set('Content-Type', 'application/json');
      return $response;
    }
}
