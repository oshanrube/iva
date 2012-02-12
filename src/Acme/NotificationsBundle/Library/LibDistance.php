<?php
namespace Acme\NotificationsBundle\Library;

use Acme\NotificationsBundle\Library\Includes\GoogleDistancematrix;
use Acme\NotificationsBundle\Library\LibLocation;
use Acme\WeatherBundle\Library\LibWeather;

class LibDistance{
	//Entity Manager
	private $em,$distance;
	
	public function __construct($em)
	{
		$this->em = $em;
	}
	
	public function getTravelTime($origin,$destination,$user) {
		// from google of course:D
		$ggl = New GoogleDistancematrix();
		//get Routes
		$routes = $ggl->getRoutes($origin,$destination);
		//get best route
		$route = $ggl->getBestRoute($routes);
		//check with the weather
      //1st get Location
      $loc = new LibLocation($this->em);
      $location = $loc->getLocation($destination['lat'],$destination['lng']);
      //then work on weather check
      $weather = new LibWeather($this->em);
      //get criticality level
      $level	= $weather->getWeatherCritic($location);
     	//get users avarage speed kmph
		$avg = $user->getAvgspeed();
		//calc avg speed with weather criticaliity
		$avg = $avg*(1+(1-$level));
		//distance in km
		$this->distance = $route->distance->value/1000; 
		//oldest calc in the book
		//time = distance/speed
		//h = km/kmph
		$time = $this->distance/$avg;
		//return mins
		return round($time*60);
	}
	public function getDistance() {
		return $this->distance;	
	}
}