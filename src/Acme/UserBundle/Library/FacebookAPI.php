<?php
namespace Acme\UserBundle\Library;

class FacebookAPI{
	
	private $url,$query,$error;
	private $cachePath;
	private $client_id = '771913829048-r7orjv4ljol9aashnbrj11jrropuuf4j.apps.googleusercontent.com';
	private $client_secret = 'l32EyFBKZOONwW6jTWLZWY93';
	
	public function __construct() {
		$authUrl = '';
		$this->cachePath = __DIR__.'/../../../../app/cache/app/';
	}
	public function register() {
		$url = "https://accounts.google.com/o/oauth2/auth?";
		$params['scope'] = 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email';
		$params['redirect_uri'] = 'http://iva.whatsupbuddy.com/redirect.php/?path=user/google/login'; 
		$params['response_type'] = 'code';
		$params['state'] = 'login';
		$params['client_id'] = $this->client_id;
		$params['access_type'] = 'offline';
		$params['approval_prompt'] = 'auto';
		$url .= http_build_query($params);
		return $url;
	}
	
	public function getAccessToken($code) {
		$this->url = 'https://accounts.google.com/o/oauth2/token';
		$params['code'] = $code;
		$params['grant_type'] 		= 'authorization_code';
		$params['client_id']			= $this->client_id;
		$params['client_secret']	= $this->client_secret;
		$params['redirect_uri'] 	= 'http://iva.whatsupbuddy.com/redirect.php/?path=user/google/login';
		$this->query = http_build_query($params);
		echo $this->query;exit(); 
		return $this->exec(true);
	}
	
	public function refreshToken($refresh_token) {
		$this->url = 'https://accounts.google.com/o/oauth2/token';
		$params['refresh_token'] = $refresh_token;
		$params['client_id']			= $this->client_id;
		$params['client_secret']	= $this->client_secret;
		$params['grant_type'] 		= 'refresh_token';
		$this->query = http_build_query($params);
		
		if($res = $this->getCache($this->query)){
			return $res;
		} else {
			$res = $this->exec(true);
			$this->addCache($this->query,$res);
		}
		return $res;
	}
	
	public function getProfile($access_token) {
		$this->url = 'https://www.googleapis.com/oauth2/v1/userinfo';
		$params['access_token'] = $access_token;
		$this->query = http_build_query($params);
		return $this->exec(false);
	}
	
	public function exec($post = false,$safe = false) {
		$DEFAULT_CURL_PARAMS = array (
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => 0,
      CURLOPT_FAILONERROR => false,
      CURLOPT_SSL_VERIFYPEER => true,
      //CURLOPT_HEADER => true,
  );
		if(!$this->query){
			$this->error .= 'Empty Query String to execute';
			return false;
		}
		//fetching data
			$ch = curl_init();
			curl_setopt_array($ch, $DEFAULT_CURL_PARAMS);
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			// curl_setopt($ch, CURLOPT_HEADER, true);
			if(!$post){
				curl_setopt($ch, CURLOPT_URL, $this->url."?".$this->query);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			} else {
				curl_setopt($ch, CURLOPT_URL, $this->url);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
				curl_setopt($ch,CURLOPT_POST, $post);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $this->query);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			}
			curl_setopt($ch, CURLOPT_USERAGENT, "google-api-php-client/0.5.0");
			$data = curl_exec($ch);
			curl_close($ch);
			echo $data;exit();
		$this->rawData = json_decode($data);
		if(!empty($this->rawData->message)){
			throw new \Exception($this->rawData->message);
		}
		return $this->rawData;
	}
	
	private function getCache($query) {
		$filename = base64_encode(md5($query)).'.gglLogin';
		if(file_exists($this->cachePath.$filename)) {
			return unserialize(file_get_contents($this->cachePath.$filename));
		}
		return false;
	}
	
	private function addCache($query,$data) {
		$filename = base64_encode(md5($query)).'.gglLogin';
		$fp = fopen($this->cachePath.$filename,"w+");
				fwrite($fp,serialize($data));
				fclose($fp);
	}
}