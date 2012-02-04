<?php
namespace Acme\TaskBundle\Library\Includes;
/*
* Foursquare-php Foursquare checkins fetcher php class
* Connect to your foursquare account and retrive your last chekin location to display it along with a google map on your page
* Author: Elie Bursztein http://elie.im / @elie on Twitter
* INSTALL: For installation instructions and how to get an oauth token see 
* URL: http://code.google.com/p/foursquare-php/
* Version: 0.2
* License: GPL v3
*/

class Foursquare {

	private $token = "P0SXOAA10CF4NVJGV1ZBOCRK53IC1TDATWFNNFTQTAIEAJNJ&v=20120127";
	private $rawData = "";  ///\! FourSquare raw data as a php object
	private $url = "https://api.foursquare.com/v2/#action#?oauth_token=";
	private $query = "",$cachePath;
	public $error = "FoursquareAPI : ";
	
	function __construct($accurate = false,$safe = false) {
		$this->url .= $this->token."&";
		if(!$accurate){
			$this->url .= "radius=100000&intent=browse&";	
		}
		$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
	}
    
	public function venuesSearch($query,$long,$lat) {
		if(!$long || !$lat){
			$this->error .= 'Location is requred';
			return false;
		}
		//get action
		$action = 'venues/search';
		//preform the query string
		$params = array( 'query' => $query , 'll' => $lat.','.$long);
		//add action to the url
		$url = str_replace('#action#',$action,$this->url);
		
		//add query string to the url
		$url .= http_build_query($params);
		$this->query = $url;
		$json = $this->exec();
		if(isset($json->response->venues)){
			return $json->response->venues;
		} else {
			return false;
		}
	}
	
	public function getVenue($locationId) {
		//get action
		$action = 'venues/'.$locationId;
		//add action to the url
		$url = str_replace('#action#',$action,$this->url);
		
		$this->query = $url;
		$json = $this->exec();
		if(isset($json->response->venue)){
			return $json->response->venue;
		} else {
			return false;
		}
	}
	
	public function exec($safe = false) {
		if(!$this->query){
			$this->error .= 'Empty Query String to execute';
			return false;
		}
		if(!$data = $this->getCache($this->query)){
			//fetching data
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->query);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERAGENT, "fetcher " . time()); //prevent rate limit
			curl_setopt($ch, CURLOPT_SSLVERSION, 3);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $safe);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			$data = curl_exec($ch);
			curl_close($ch);
			$this->addCache($this->query,$data);
		}
		$this->rawData = json_decode($data);
		return $this->rawData;
	}
	
	private function getCache($query) {
		$filename = base64_encode(md5($query)).'.4sq';
		if(file_exists($this->cachePath.$filename)) {
			return unserialize(file_get_contents($this->cachePath.$filename));
		}
		return false;
	}
	
	private function addCache($query,$data) {
		$filename = base64_encode(md5($query)).'.4sq';
		$fp = fopen($this->cachePath.$filename,"w+");
				fwrite($fp,serialize($data));
				fclose($fp);
	}
	/*
	* Get the google map img url corresponding to the foursquare location
	* 
	* @param $width map width
	* @param $height map height
	* @param $mobile is this a map for a mobile page ? default false
	* @param $maptype what type of map to render. Possible choice : roadmap, satellite, hybrid, and terrain. Default "roadmap"
	* @param $zoom : level of zoom in the map default 12
	* @param $markerText: text en the marker default "" (can only be a single uppercase letter) put "" for a .
	* @param $markerText: color of the marker default blue
	* 
	* @return the url of the map to include in an SRC
	* 
	* @version 0.2
	* @date 08/24/11 
	* @author Elie
	* 
	*/

	public function getMapUrl($width, $height, $zoom = 12, $markerText = "me", $markerColor = "blue", $mobile = FALSE, $maptype = "roadmap") {



		$mapUrl = "http://maps.google.com/maps/api/staticmap?";      //static map url
		$mapUrl .= "sensor=true";                                     //we are using the GPS through foursquare so it is a sensor map.
		$mapUrl .= "&center=" . $this->geolat . "," . $this->geolong;   //position returned by foursquare

		$mapUrl .= "&maptype=" . $maptype;

		$mapUrl .= "&size=" . $width . "x" . $height;
		$mapUrl .= "&zoom=" . $zoom;

		$markerText = strtoupper(substr($markerText, 0, 1));
		$mapUrl .= "&markers=color:" . $markerColor . "|label:" . $markerText . "|" . $this->geolat . "," . $this->geolong . "|";


		return $mapUrl;
	}

	/*
	* Return the location encoded in the JSON format. 
	* 
	* This function is mainly intended to create AJAX interface and call the lib via XHR request
	* 
	* @param $position which checking position to get in inverse order. Default is 0 the latest one.
	* @return $json the checkin information encode in json. 
	* @version 0.1
	* @date 08/24/11 
	* @author Elie
	*/

	public function getJson($position = 0) {

		/*
			*    public $date = "";
			public $venueName = "";
			public $venueCat = "";
			public $venueType = "";
			public $venueIcon = "http://foursquare.com/img/categories/question.png";
			public $comment = "";
			public $venueAddress = "";
			public $venueCity = "";
			public $venueState = "";
			public $venueCountry = "";
			public $geolong = "";
			public $geolat = "";
			*/


		$data = Array();
		$data["venueName"] = $this->venueName;
		$data["venueCat"] = $this->venueCat;
		$data["venueType"] = $this->venueType;
		$data["venuIcon"] = $this->venueIcon;
		$data["comment"] = $this->comment;
		$data["venueAddress"] = $this->venueAddress;
		$data["venueCity"] = $this->venueCity;
		$data["venueState"] = $this->venueState;
		$data["venueCountry"] = $this->venueCountry;
		$data["geolong"] = $this->geolong;
		$data["geolat"] = $this->geolat;

		$json = json_encode($data);
		return $json;
	}

}

?>