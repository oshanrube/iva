<?php

namespace Acme\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\NewsBundle\Library\LibNews;


class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('AcmeNewsBundle:Default:index.html.twig');
	}
	public function ajaxAction()
	{
		//if(!$this->getRequest()->isXmlHttpRequest())
		//	return $this->redirect($this->generateUrl('error'));
		
		$news = new LibNews($this->getDoctrine()->getEntityManager());
		$feed = $news->getTodaysNews('Colombo');
		//
		$templating = $this->get('templating');
    	$page = $templating->render('AcmeNewsBundle:Default:panel.html.twig', array('feed' => $feed));
    	$response = new Response(json_encode(array('page' => $page)));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
	}
}
