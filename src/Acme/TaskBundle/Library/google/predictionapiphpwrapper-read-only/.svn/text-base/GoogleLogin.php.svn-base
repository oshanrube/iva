<?php

/*
 * /*
 * @author: David McNelis <dmcnelis@entunne.com
 * @company: enTunne LLC
 * @website: entunne.com
 * @license: Apache License 2.0
 * @link: https://predictionapiphpwrapper.googlecode.com/

 * Simple google login class. Your code will need to handle the actual
 * display and input of the captcha string.  
 */
class GoogleLogin {
	public $authCode;
	public $captchaUrl;
	public $captchaToken;
	public $responseCallback;
	public $appName = "YOURAPPNAME";
	private $_username;
	private $_password;
	
	/*
	 * __construct()
	 * __construct($username, $password)
	 */
	function __construct(){
		$numArgs = func_num_args();
		$args = func_get_args();
		if($numArgs=2){
			$this->_username = $args[0];
			$this->_password = $args[1];
			$this->login();
		}
		
	}
	
	public function setUsername($username){
		$this->_username = $username;
	}
	public function setPassword($password){
		$this->_password = $passowrd;
	}
	
	/* Uses objects username and password to attempt login.
	 * If successful, $authCode is set, otherwise, the info 
	 * needed to display a captcha page is set.
	 * 
	 * In other words, when you get the function completes (either called
	 * manually or through the constructor) check that the authCode is set.
	 * If not, you'll need to gracefully handle the captcha.
	 */
	public function login(){
		
		$fields = array('accountType'=> 'HOSTED_OR_GOOGLE',
		'Email'=>$this->_username,
		'Passwd'=>$this->_password,
		'service'=>'xapi',
		'source'=>$this->appName);
		$url =  "https://www.google.com/accounts/ClientLogin";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		$this->responseCallback = curl_exec($ch);
		$this->parseLoginResponse();
		if(!$this->responseCallback ["Auth"]){
			$this->captchaUrl = $this->responseCallback ["CaptchaUrl"];
			$this->captchaToken = $this->responseCallback ["CaptchaToken"];
			
		}else{
			$this->authCode = $this->responseCallback ["Auth"];

		}	
	}
	
	/*
	 * If a captcha string and not an authcode was previously returned
	 * You'll want to call this to pass back the needed elements
	 */
	public function loginCaptcha($string){
		$fields = array('accountType'=> 'HOSTED_OR_GOOGLE',
		'Email'=>$this->_username,
		'Passwd'=>$this->_password,
		'service'=>'xapi',
		'source'=>$this->appName,
		'logintoken'=>$this->captchaToken,
		'logincaptcha'=>$string);
		$url =  "https://www.google.com/accounts/ClientLogin";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		$this->responseCallback = curl_exec($ch);
		$this->parseLoginResponse();
		if(!isset($this->responseCallback["Auth"])){
			
			if(!isset($this->responseCallback["CaptchaToken"]))
				$this->captchaToken = "Old - " . $token;
			else{
				$this->captchaToken =$this->responseCallback["CaptchaToken"];
				$this->captchaUrl = $this->responseCallback["CaptchaUrl"];
			}
		}else{
			$this->authCode = $this->responseCallback["Auth"];

		}
		
	}
	
	/*
	 * Parses the response for GoogleLogin to create an array of 
	 * values from the response
	 */
	private function parseLoginResponse() {
		$result = array();
		$lines = split("\n", $this->responseCallback);
		$key = "";
		$isWaitingOtherLine = false;
		foreach ($lines as $i => $line) {
			if (empty($line) || (!$isWaitingOtherLine && strpos($line, "#") === 0))
				continue;

			if (!$isWaitingOtherLine) {
				$key = substr($line, 0, strpos($line, '='));
				$value = substr($line, strpos($line, '=')+1, strlen($line));
			}
			else {
				$value .= $line;
			}	

			/* Check if ends with single '\' */
			if (strrpos($value, "\\") === strlen($value)-strlen("\\")) {
				$value = substr($value,0,strlen($value)-1)."\n";
				$isWaitingOtherLine = true;
			}
			else {
				$isWaitingOtherLine = false;
			}

			$result[$key] = $value;
			unset($lines[$i]);
		}

		$this->responseCallback = $result;
	}
	
}
?>