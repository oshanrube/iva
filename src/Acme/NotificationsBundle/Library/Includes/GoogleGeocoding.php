<?php
namespace Acme\NotificationsBundle\Library\Includes;

class GoogleGeocoding{
	
	private $query,$cachePath;
	private $baseUrl = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=#LATLNG#&sensor=false';
	
	public function __construct(){
		$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
	}
		
	public function getLocation($lat,$lng) {
		//set url
		$this->baseUrl =  str_replace('#LATLNG#',$lat.','.$lng,$this->baseUrl);
		//execute
		$this->query = $lat.','.$lng;
		$response = json_decode($this->exec());
		//if server is responding
		if($response->status == "OK"){
			if($response->results[3]->address_components[0]->short_name)
				return $response->results[3]->address_components[0]->short_name;
		}
		return false;
	}
	
	//run the 
	public function exec() {
		//check the cache
		if($resultado = $this->getCache($this->query)){
			if($resultado == "") return false;
			return $resultado;
		}
		//curl 
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $this->baseUrl);
		$resultado = curl_exec($curl);
		curl_close($curl);
		//add to cache
		$this->addCache($this->query,$resultado);
		
		return $resultado;
	}
	private function getCache($query) {
		$filename = base64_encode(md5($query)).'.gglGeo';
		if(file_exists($this->cachePath.$filename)) {
			return unserialize(file_get_contents($this->cachePath.$filename));
		}
		return false;
	}
	
	private function addCache($query,$data) {
		$filename = base64_encode(md5($query)).'.gglGeo';
		$fp = fopen($this->cachePath.$filename,"w+");
				fwrite($fp,serialize($data));
				fclose($fp);
	}
}