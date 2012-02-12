<?php

namespace Acme\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\WeatherBundle\Library\LibWeather;
use Acme\WeatherBundle\Entity\Weather;

class DefaultController extends Controller
{
	public function indexAction()
	{
      $LibWeather = new LibWeather($this->getDoctrine()->getEntityManager());
		$TodaysWeather = $LibWeather->getWeather('Colombo');
		
		return $this->render('AcmeWeatherBundle:Default:index.html.twig',array('todaysWeather' => $TodaysWeather));
	}
}