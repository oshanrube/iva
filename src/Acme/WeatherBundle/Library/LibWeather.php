<?php
namespace Acme\WeatherBundle\Library;
use Acme\WeatherBundle\Library\Includes\Googleweather;

class LibWeather{
	
	private $doctrine;
	
	public function __construct($doctrine) {
		$this->doctrine = $doctrine;
	}
	public function getWeather($location) {
		$Gweather = new Googleweather($this->doctrine);
      //return 
		return $Gweather->getWeather($location);
	}
	
}