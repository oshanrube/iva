<?php
namespace Acme\NotificationsBundle\Library\Includes;
use Acme\NotificationsBundle\Library\LibNotification;

class UrbanAirship{

	private $baseUrl = "https://go.urbanairship.com/api/push/";
	private $APP_MASTER_SECRET = 'zPGL_u2pTQ6Jvjhp1G1vLg';
	private $APP_KEY = 'c90dgermSm6nID5Dh4GCeA';
	private $SMS_SERVER_MASTER_SECRET = 'aP1x_SDVSDizSF4qeh9vFw';
	private $SMS_SERVER_KEY = 'cNLJP_y4RcKTCj_C8i6qiQ';
	
	private $vars;
		
	public function sendNotification($user,$notification) {
		//prepair the message
		//$message = 'REMINDER: '.$notification->getTask()->getDescription().' At '.date("D M j G:i:s",$notification->getTask()->getStartTime());
		$message = LibNotification::createMessage($notification);
		$colour = $notification->getTask()->getTaskColour()->getColour();
    	if($colour == "Default"){$colour = '000000';}
    	$datetime = date('l jS \of F Y h:i:s A',$notification->getTask()->getStartTime());
		// create the contents of the android field
      $android = array();
      $android['alert'] = $message;
      $android['extra'] = new \stdClass();      
      $android['extra']->id = (String) $notification->getId();
      $android['extra']->colour = '#'.$colour;
      $android['extra']->datetime = $datetime;
      $android['extra']->lng = (String) $notification->getTask()->getLng();
      $android['extra']->lat = (String) $notification->getTask()->getLat();
      $android['extra']->location = $notification->getTask()->getLocation();
     
      // create the contents of the main json object
      $dictionary = array();
      $dictionary['android'] = $android;
      $dictionary['apids'] = array($this->getDeviceId($user)); // The specific android urban airship phone id

      if(strlen($dictionary['apids'][0]) < 10)
      	return false;
      	
      echo "pushed noti ".$notification->getId()." to ".$this->getDeviceId($user)."\n";
      // convert the dictionary to a json string
      $this->vars = json_encode($dictionary);
		//send
		return $this->exec();
	}
	public function sendSms($user,$notification) {
		//prepair the message
		$message = 'REMINDER: '.$notification->getTask()->getDescription().' At '.date("D M j G:i:s",$notification->getTask()->getStartTime());
		// create the contents of the android field
      $android = array();
      $android['alert'] = 'Send SMS';
      $android['extra'] = new \stdClass();
      $android['extra']->text = $message;
      $android['extra']->number =(string) $user->getPhoneNum();
      
      //if the user phone number is empty
      if(strlen($user->getPhoneNum()) < 10)
      	return false;

      // create the contents of the main json object
      $dictionary = array();
      $dictionary['android'] = $android;
      $dictionary['apids'] = array($this->getSMSServerId()); // The specific android urban airship phone id
      echo "pushed to ".$this->getSMSServerId()."\n";
      // convert the dictionary to a json string
      $this->vars = json_encode($dictionary);
		//send
		return $this->exec(true);
	}
	public function getDeviceId($user) {
      $link = 'http://iva.whatsupbuddy.com/getAPID.php?un='.urlencode($user->getEmail());
      //echo $link;
		return file_get_contents($link);
	}
	public function getSMSServerId() {
      $link = 'http://iva.whatsupbuddy.com/getAPID.php?un=IVASMSServer';
      //echo $link;
		return file_get_contents($link);
	}
	
	//run the 
	public function exec($sms = false) {
		// open connection
      $ch = curl_init();
		// set the url, number of POST vars, POST data
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json",));
      if($sms)
      	curl_setopt($ch, CURLOPT_USERPWD,$this->SMS_SERVER_KEY.":".$this->SMS_SERVER_MASTER_SECRET);
      else
      	curl_setopt($ch, CURLOPT_USERPWD,$this->APP_KEY.":".$this->APP_MASTER_SECRET);
      curl_setopt($ch, CURLOPT_URL, $this->baseUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $this->vars);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // execute post
      if(!$res = curl_exec($ch))
		{
			// close connection
      	curl_close($ch);
		   echo 'Curl error: ' . curl_error($ch);
		   return false;
		}
		echo $res."\n";
		// close connection
      curl_close($ch);
		return true;
	}

}