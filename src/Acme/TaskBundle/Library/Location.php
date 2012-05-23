<?php
namespace Acme\TaskBundle\Library;
use Acme\TaskBundle\Library\Includes\Foursquare;
//require_once __DIR__.'/Includes/SpellCorrector.php';
//require_once __DIR__."/includes/googleLibrary.php";

class Location{
	private $sentences = array();
	
	public function searchLocation($sentence,$locations,$long,$lat,$accurate = true,$suggestions = false) {
		//loop thro the location list
		foreach($locations as $key => $location){
			//check in foursquare
			$foursquare = new Foursquare($accurate);
			if($venues = $foursquare->venuesSearch($location,$long,$lat)){
				foreach($venues as $venue){
					if($venue->name == $location){
						return $venue;
					}
					if($suggestions) {
						//add replaced sentences
						$this->sentences[] = str_replace($location,$venue->name,$sentence);
					}
					//
					$loc = new \stdClass();
					$loc->loc = $location;
					$loc->name = $venue->name;
					$loc->lng = $venue->location->lng;
					$loc->lat = $venue->location->lat;
					$loc->id = $venue->id;
					$this->venues[] = $loc; 
				}
			}
		}
	}
	
	public function getLocation($locationId,$accurate = true) {
		//check in foursquare
		$foursquare = new Foursquare($accurate);
		return $foursquare->getVenue($locationId);
	}
	
	public function improveSentence() {
		return $this->sentences;
	}
	public function getVenues() {
		if(isset($this->venues)){
			return $this->venues;
		} else {
			return array();
		}
	}
}