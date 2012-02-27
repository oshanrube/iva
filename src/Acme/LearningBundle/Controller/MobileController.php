<?php

namespace Acme\LearningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MobileController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AcmeLearningBundle:Mobile:index.html.twig');
    }
}
