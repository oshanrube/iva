<?php
namespace Acme\NotificationsBundle\Library\Includes;

class UrbanAirship{

	private $baseUrl = "https://go.urbanairship.com/api/push/";
	private $APP_MASTER_SECRET = 'zPGL_u2pTQ6Jvjhp1G1vLg';
	private $APP_KEY = 'c90dgermSm6nID5Dh4GCeA';
	private $vars;
		
	public function sendNotification($user,$notification) {
		//prepair the message
		$message = 'REMINDER: '.$notification->getTask()->getDescription().' At '.date("D M j G:i:s",$notification->getTask()->getStartTime());
    	$colour = $notification->getTask()->getTaskColour()->getColour();
    	if($colour == "Default"){$colour = '000000';}
    	$datetime = date('l jS \of F Y h:i:s A',$notification->getTask()->getStartTime());
		// create the contents of the android field
      $android = array();
      $android['alert'] = $message;
      $android['extra'] = new \stdClass();
      $android['extra']->colour = '#'.$colour;
      $android['extra']->datetime = $datetime;

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
      $link = 'http://iva.whatsupbuddy.com/getAPID.php?un='.urlencode($user->getEmail());
      //echo $link;
		return file_get_contents($link);
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
      if(curl_exec($ch) == null)
		{
			// close connection
      	curl_close($ch);
		   echo 'Curl error: ' . curl_error($ch);
		   return false;
		}
		exit();
		// close connection
      curl_close($ch);
		return true;
	}

}