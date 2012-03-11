<?php

namespace Acme\CalendarBundle\Library;
use Acme\CalendarBundle\Library\Includes\Facebook;
use Acme\TaskBundle\Model\TaskModel;

class Sync{
	private $em;
	
	public function __construct($em) {
		$this->em = $em;
	}
	
	private function geturl() {
		// Create our Application instance (replace this with your appId and secret).
		$facebook = new Facebook(array(
		  'appId'  => '236123993144257',
		  'secret' => 'c13e8c27c6b3dd0f00fb161c4fe371dc',
		  'cookie' => true,
		));
		$session = $facebook->getSession();
		
		$me = null;
		// Session based API call.
		if ($session) {
		  try {
		    $uid = $facebook->getUser();
		    $me = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
		    error_log($e);
		  }
		}
		$loginUrl = $facebook->getfbuploadAuthUrl();
		
		return $loginUrl;
	}
	
	public function facebook($user) {
		$facebook = new \stdClass();
		$facebook->synced = false;
		//is there a sheduled check already
		$schedule = $this->em->getRepository('AcmeScheduleBundle:Schedule')
						->findOneByCommand( 'calendar:syncfacebook '.$user->getUsername() );
		if(count($schedule) > 0){ 
			$facebook->synced = true;
		}
		//if the user already has a token
		else if(!$facebook->token = $user->getFbToken()){
			//else get the url to authenticate
			$facebook->addurl = $this->geturl();
		}
		return $facebook;
	}
	
	public function syncFacebook($user) {
		$FBevents = array();
		/** EVENTS **/
		//create new fb object
		$facebook = new Facebook();
		$facebook->setAccessToken($user->getFbToken());
		$facebook->setAction('events');
		//execute
		$events = $facebook->exec();
		//error
		if(isset($events->error)){
			$this->error = $events->error->message;
			return false;
		}
		//load all events
		while(count($events->data)>0){
			$FBevents = array_merge($FBevents,$events->data);
			//next page
			$events = $facebook->exec($events->paging->next);
		}
		//create events
		$taskmodel = New TaskModel($this->em);
		foreach($FBevents as $event){
			$taskmodel->addFacebookEvent($user,$event);
		}
		/***************/
		/** BIRTHDAYS **/
		$FBFriends = array();
		//grab the friendlist
		$facebook->setAction('friends');
		//execute
		$friends = $facebook->exec();
		//error
		if(isset($friends->error)){
			$this->error = $friends->error->message;
			return false;
		}
		//load all events
		while(count($friends->data)>0){
			$FBFriends = array_merge($FBFriends,$friends->data);
			//next page
			$friends = $facebook->exec($friends->paging->next);
		}
		//loop through friends
		foreach($FBFriends as $friend){
			echo 'Updating birthday for '.$friend->name."\n";
			$facebook->setAction('',$friend->id);
			$profile = $facebook->exec();
			if(isset($profile->birthday)){
				$taskmodel->addFacebookBirthday($user,$profile);
			}
		}
		return;
	}	
}














