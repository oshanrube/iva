<?php

namespace Acme\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
    	if(Mobile::isMobile())return $this->redirect($this->generateUrl('AcmeMobileBundle_homepage'));
        return $this->render('AcmeLearningBundle:Default:index.html.twig', array('name' => $name));
    }
}
