<?php
namespace Acme\NotificationsBundle\Library\Includes;

class GoogleDistancematrix{
	
	private $query,$cachePath;
	private $baseUrl = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins=#ORIGIN#&destinations=#DESTINATION#&sensor=false';
	
	public function __construct(){
		$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
	}
		
	public function getRoutes($origin,$destination) {
		//set url
		$this->baseUrl =  str_replace('#ORIGIN#',implode(',',$origin),$this->baseUrl);
		$this->baseUrl =  str_replace('#DESTINATION#',implode(',',$destination),$this->baseUrl);
		//execute
		$this->query = implode(',',$origin).':'.implode(',',$destination);
		$response = json_decode($this->exec());
		//if server is responding
		if($response->status == "OK"){
			//if there are valid routes
			if($response->rows[0]->elements[0]->status == "OK"){
				return $response->rows[0]->elements;
			}
		}
		
		return false;
	}
	
	//TODO calculate the best route depending on the news
	public function getBestRoute($routes) {
		return $routes[0];
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
		$filename = base64_encode(md5($query)).'.gglDis';
		if(file_exists($this->cachePath.$filename)) {
			return unserialize(file_get_contents($this->cachePath.$filename));
		}
		return false;
	}
	
	private function addCache($query,$data) {
		$filename = base64_encode(md5($query)).'.gglDis';
		$fp = fopen($this->cachePath.$filename,"w+");
				fwrite($fp,serialize($data));
				fclose($fp);
	}
}