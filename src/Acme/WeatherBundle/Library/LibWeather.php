<?php
namespace Acme\WeatherBundle\Library;

use Acme\WeatherBundle\Library\Includes\Googleweather;

class LibWeather{
	
	//Entity Manager
	private $em,$wCondition;
	
	public function __construct($em) {
		$this->em = $em;
	}
	public function getWeather($location) {
		$Gweather = new Googleweather($this->em);
      //return 
		return $Gweather->getWeather($location);
	}
	public function getWeatherCritic($location,$datetime) {
		$Weather = $this->em->getRepository('AcmeWeatherBundle:Weather')
						->findOneByDatetimeAndLocation($datetime,$location);
		if($Weather){
			$this->wCondition = $Weather->getWcondition();
			return $Weather->getWcondition()->getCriticality();
		}else {return false;}
	}
	
	public function getWCondition() {
		return $this->wCondition;
	}
}