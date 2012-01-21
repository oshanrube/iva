<?php

namespace Acme\EventsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeEventsBundle:Default:index.html.twig', array('name' => $name));
    }
}
