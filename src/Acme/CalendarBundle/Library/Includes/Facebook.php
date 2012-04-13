<?php
namespace Acme\CalendarBundle\Library\Includes;

class Facebook
{
	private $permission = "user_birthday,user_events,friends_birthday,offline_access,rsvp_event,read_friendlists,user_hometown,user_events,friends_events";
	private $access_token,$path,$cachePath;
	private $appId,$secret;
	private $params = array();
	private $base_url = 'https://graph.facebook.com/';
	private $redirectUrl = 'http://iva.whatsupbuddy.com/redirect.php/?path=user/facebook/login';
	
	public function __construct() {
		$this->appId  = '236123993144257';
		$this->secret = '7d0971c045d0ece5043a8b253e6c06d5';
	}
	
	//this will return the auth url 
	public function getUrl() {
		$url = "https://www.facebook.com/dialog/oauth?client_id=".$this->appId."&redirect_uri=".$this->redirectUrl."&scope=".$this->permission."&state=".md5(date('c'));
 		return $url;
	}
	//get access token
	public function getAccessToken($code){
		$params['client_id'] = $this->appId;
   	$params['redirect_uri'] = $this->redirectUrl;
   	$params['client_secret'] = $this->secret;
   	$params['code'] = $code;
		$url = 'https://graph.facebook.com/oauth/access_token?'.http_build_query($params);
		$res = $this->exec($url, false);
		if(isset($res->error)){
			return false;
		}
		return $res;
	}
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
	
	public function exec($url = null,$post = false) {
		if(!$url){
			$url = $this->base_url.$this->path.'?access_token='.$this->access_token.'&'.http_build_query($this->params);
		}
		if(!$response = $this->getCache($url)){
			$ch = curl_init($url);
			curl_setopt($ch,CURLOPT_POST, $post);
			if($post)
			curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($this->params));
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