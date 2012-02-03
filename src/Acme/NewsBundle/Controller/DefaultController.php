<?php

namespace Acme\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\NewsBundle\Library\LibNews;

class DefaultController extends Controller
{
    
	public function indexAction()
	{
		$news = new LibNews($this->getDoctrine());
		$feed = $news->getTodaysNews('Colombo');
		return $this->render('AcmeNewsBundle:Default:index.html.twig', array('feed' => $feed));
	}
}
