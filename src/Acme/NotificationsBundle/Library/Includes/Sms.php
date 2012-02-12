<?php
namespace Acme\NotificationsBundle\Library\Includes;

class Sms{
	
	private $baseUrl = 'http://192.168.1.102:9090/sendsms?phone=#PHONE#&text=#MESSAGE#&password=oshan1991';
	private $vars;
	
	public function __construct(){
		
	}
		
	public function sendNotification($user,$message) {
		//set var
		$this->baseUrl = str_replace('#PHONE#',$user->getPhoneNum(),$this->baseUrl);
		$this->baseUrl = str_replace('#MESSAGE#',$message,$this->baseUrl);
		//send
		$this->exec();
		return false;
	}
	
	//run the 
	public function exec() {
		//curl 
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		echo $this->baseUrl;
		curl_setopt($curl, CURLOPT_URL, $this->baseUrl);
		$resultado = curl_exec($curl);
		curl_close($curl);
	}
}