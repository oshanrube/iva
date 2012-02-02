<?php

namespace Acme\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\WeatherBundle\Entity\Calendar;
use Acme\WeatherBundle\Library\Weather;

class DefaultController extends Controller
{
	public function indexAction()
	{
		$xml = Weather::getWeather('Colombo');
		$todaysWeather = $xml["weather"][strtotime("today")];
		return $this->render('AcmeCalendarBundle:Default:index.html.twig',array('todayWeather' => $todaysWeather));
	}
}