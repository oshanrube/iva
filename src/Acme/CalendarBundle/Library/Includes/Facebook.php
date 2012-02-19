<?php
namespace Acme\CalendarBundle\Library\Includes;

class Facebook
{
	//read_friendlists
	//user_birthday
	//user_events user_about_me  friends_birthday offline_access
	private $access_token,$path,$cachePath;
	private $params = array();
	private $base_url = 'https://graph.facebook.com/';
	
	public function setAccessToken($token) {
		$this->access_token = $token;
		$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
	}
	
	public function setAction($action,$id = null) {
		if($id){
			$this->path = $id.'/'.$action;
		} else {
			$this->path = 'me/'.$action;
		}
	}
	
	private function setParams($key,$value) {
		$this->params[$key] = $value;
	}
	
	public function exec($url = null) {
		if(!$url){
			$url = $this->base_url.$this->path.'?access_token='.$this->access_token.'&'.http_build_query($this->params);
		}
		if(!$response = $this->getCache($url)){
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
			curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
			$response = curl_exec ($ch);
			curl_close ($ch);
			$this->addCache($url,$response);
		}
		return json_decode($response);
	}
	private function getCache($query) {
		$filename = base64_encode(md5($query)).'.fb';
		if(file_exists($this->cachePath.$filename)) {
			return unserialize(file_get_contents($this->cachePath.$filename));
		}
		return false;
	}
	
	private function addCache($query,$data) {
		$filename = base64_encode(md5($query)).'.fb';
		$fp = fopen($this->cachePath.$filename,"w+");
				fwrite($fp,serialize($data));
				fclose($fp);
	}
}