<?php

namespace Acme\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeWeatherBundle:Default:index.html.twig', array('name' => $name));
    }
}
