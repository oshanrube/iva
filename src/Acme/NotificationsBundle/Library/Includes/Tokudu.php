<?php
namespace Acme\NotificationsBundle\Library\Includes;

class Tokudu{
	
	private $baseUrl = 'http://tokudu.com/demo/android-push/send_mqtt.php';
	private $vars;
	
	public function __construct(){
		$this->cachePath = __DIR__.'/../../../../../app/cache/app/';
	}
		
	public function sendNotification($user,$message) {
		//set var
		$this->vars = 'target=tokudu/'.$user->getDeviceId().'&message='.urlencode($message);
		//send
		$this->exec();
		return false;
	}
	
	//run the 
	public function exec() {
		//curl 
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
 		curl_setopt($curl, CURLOPT_POSTFIELDS, $this->vars);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $this->baseUrl);
		$resultado = curl_exec($curl);
		curl_close($curl);
	}
}