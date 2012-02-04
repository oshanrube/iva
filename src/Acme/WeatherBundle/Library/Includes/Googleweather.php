<?php
namespace Acme\WeatherBundle\Library\Includes;
use Acme\WeatherBundle\Entity\WCondition;
use Acme\WeatherBundle\Entity\Weather;


class Googleweather {
	private $cachePath,$doctrine;
	private static $containerInstance = null; 
	
	public function __construct($doctrine)
	{
		$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
		$this->doctrine = $doctrine;
	}

	public function getWeather($location) {
		$today = strtotime('today');
		$Weather = $this->doctrine->getRepository('AcmeWeatherBundle:Weather');
		$em = $this->doctrine->getEntityManager();
		//check in database
		if($w = $Weather->findOneByDatetimeAndLocation($today,$location)){
			return $w;
		}
		$doc = new \DOMDocument();
		$doc->load( 'http://www.google.com/ig/api?weather='.$location );
		
		$forecast_information = $doc->getElementsByTagName( "forecast_information" );
		$forecast_date = $forecast_information->item(0)->getElementsByTagName( "forecast_date" )->item(0)->getAttribute("data");
		//$xml['weather']['forecast_information']['date'] = strtotime($forecast_date);
		$date = strtotime($forecast_date);
		
		$current_conditions = $doc->getElementsByTagName("current_conditions")->item(0);
		$xml['weather'][$date]['condition'] = $current_conditions->getElementsByTagName( "condition" )->item(0)->getAttribute("data");
		$xml['weather'][$date]['temp_f'] = $current_conditions->getElementsByTagName( "temp_f" )->item(0)->getAttribute("data");
		$xml['weather'][$date]['temp_c'] = $current_conditions->getElementsByTagName( "temp_c" )->item(0)->getAttribute("data");
		$xml['weather'][$date]['humidity'] = $current_conditions->getElementsByTagName( "humidity" )->item(0)->getAttribute("data");
		$xml['weather'][$date]['icon'] = "http://www.google.com".$current_conditions->getElementsByTagName( "icon" )->item(0)->getAttribute("data");
		$xml['weather'][$date]['wind_condition'] = $current_conditions->getElementsByTagName( "wind_condition" )->item(0)->getAttribute("data");
		
		$forecast_conditions = $doc->getElementsByTagName( "forecast_conditions" );
		$day=1;
		foreach( $forecast_conditions as $condition )
		{
			$date = strtotime($forecast_date." +".$day++."Day ");
			$xml['weather'][$date]['day_of_week'] = $condition->getElementsByTagName( "day_of_week" )->item(0)->getAttribute("data");
			$xml['weather'][$date]['low'] = $condition->getElementsByTagName( "low" )->item(0)->getAttribute("data"); 
			$xml['weather'][$date]['high'] = $condition->getElementsByTagName( "high" )->item(0)->getAttribute("data");
			$xml['weather'][$date]['icon'] = "http://www.google.com".$condition->getElementsByTagName( "icon" )->item(0)->getAttribute("data");
			$xml['weather'][$date]['condition'] = $condition->getElementsByTagName( "condition" )->item(0)->getAttribute("data"); 
		}
		$this->saveToDB($xml,$location);
		
		return $xml['weather'][$today];
	}
	private function saveToDB($xml,$location) {
		$Weather = $this->doctrine->getRepository('AcmeWeatherBundle:Weather');
		$WCondition = $this->doctrine->getRepository('AcmeWeatherBundle:WCondition');
		$em = $this->doctrine->getEntityManager();
		//save data to DB
		//loopthrough the results
		foreach($xml['weather'] as $day => $weather){
			if($Weather->findOneByDatetimeAndLocation($day,$location)){
				continue;
			}
			//get condition
			if(!$condition = $WCondition->findOneByName($weather['condition'])){
				//if not add condition
				$condition = new WCondition();
     			$condition->setName($weather['condition']);
     			$condition->setIcon($weather['icon']);
     			$em->persist($condition);
     			$em->flush();
			}
			$NewWeather = new Weather();
			$NewWeather->setDatetime($day);
			$NewWeather->setLocation($location);
			$NewWeather->setWcondition($condition);
			
    		$em->persist($NewWeather);
		}
		$em->flush();
	}
}