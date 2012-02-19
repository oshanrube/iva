<?php

namespace Acme\ScheduleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeScheduleBundle:Default:index.html.twig', array('name' => $name));
    }
}
