<?php

namespace Acme\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\LearningBundle\Entity\LearnUserLocation;

class MobileController extends Controller
{
    
	public function indexAction()
	{
		return $this->render('AcmeLearningBundle:Mobile:index.html.twig');
	}
}
