<?php
namespace Acme\NotificationsBundle\Library\Includes;

class UrbanAirship{

	private $baseUrl = "https://go.urbanairship.com/api/push/";
	private $APP_MASTER_SECRET = 'zPGL_u2pTQ6Jvjhp1G1vLg';
	private $APP_KEY = 'c90dgermSm6nID5Dh4GCeA';
	private $vars;
		
	public function sendNotification($user,$message) {
		// create the contents of the android field
      $android = array();
      $android['alert'] = $message;
      $android['extra'] = 'nulll';

      // create the contents of the main json object
      $dictionary = array();
      $dictionary['android'] = $android;
      $dictionary['apids'] = array($this->getDeviceId($user)); // The specific android urban airship phone id
        // convert the dictionary to a json string
      $this->vars = json_encode($dictionary);
		//send
		return $this->exec();
	}
	public function getDeviceId($user) {
		return file_get_contents('http://iva.whatsupbuddy.com/getAPID.php?un='.$user);
	}
	
	//run the 
	public function exec() {
		// open connection
      $ch = curl_init();
		// set the url, number of POST vars, POST data
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json",));
      curl_setopt($ch, CURLOPT_USERPWD,$this->APP_KEY.":".$this->APP_MASTER_SECRET);
      curl_setopt($ch, CURLOPT_URL, $this->baseUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $this->vars);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // execute post
      if(curl_exec($ch) === false)
		{
			// close connection
      	$res = curl_close($ch);
		   echo 'Curl error: ' . curl_error($ch);
		   return false;
		}
		// close connection
      $res = curl_close($ch);
		return true;
	}

}