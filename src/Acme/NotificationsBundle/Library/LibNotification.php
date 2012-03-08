<?php
namespace Acme\NotificationsBundle\Library;

use Acme\NotificationsBundle\Library\LibDistance;
use Acme\TaskBundle\Entity\Notification;
use Acme\NotificationsBundle\Library\Includes\GtalkNotifications;
use Acme\NotificationsBundle\Library\Includes\Tokudu;
use Acme\NotificationsBundle\Library\Includes\UrbanAirship;
use Acme\NotificationsBundle\Library\Includes\Sms;
use Acme\NotificationsBundle\Model\TaskRepeatModel;

class LibNotification{
	
	private $em;
		
	public function __construct($em) {
		$this->em = $em;
	}
	
	public function getNotification($task) {
		//get location and datetime
		$datetime 	= $task->getStartTime();
		$dest['lat']= $task->getLat();
		$dest['lng']= $task->getLng();
		$userId 		= $task->getUserId();
		$taskId 		= $task->getId();
		$taskType 	= $task->getTaskType();
		$taskRepeat	= $task->getTaskRepeat();
		//1st get the user
      $user = 	$this->em->getRepository('AcmeUserBundle:User')
      			->findOneById($userId);
     	//if task is a repeat
      if($taskRepeat->getId() != 1){
      	//get next notifiction
      	$datetime = TaskRepeatModel::getNextRepeat($task);
      }
      //get the time which takes to prepair
      $prepareTime = $taskType->getPrepare();
      /** calculate distance **/
      if($dest['lat'] != 0 && $dest['lng'] != 0){//if location matters
			//get the task before it
	    	$taskBefore = 	$this->em->getRepository('AcmeTaskBundle:Task')
	            			->findOneByOneBefore($datetime,$userId);
	      //if there is no task before this
	      if(!$taskBefore){
	      	//get the users last known location
	      	$origin['lat'] = $user->getLat();
	      	$origin['lng'] = $user->getLng();
	      //else get the task before location
	      } else {
	      	$origin['lat'] = $taskBefore->getLat();
	      	$origin['lng'] = $taskBefore->getLng();
	      }
	      //calculate the distance
      	$distance = new LibDistance($this->em);
      	//get the travel time
      	$travelTime = $distance->getTravelTime($origin,$dest,$user,$datetime);
      	//get weather condition
      	$wCondition = $distance->getWCondition();
      	//calc total time estimate
      	$totalTime = $travelTime + $prepareTime;
      } else {
      	$travelTime = 0;
      } 
      if(!isset($wCondition)){
      	$wCondition = $this->em->getRepository('AcmeWeatherBundle:WCondition')
								->findOneByName('Mostly Sunny');
      }
      
      //get the notify time
      $timestamp = strtotime(' -'.$travelTime.' minutes',$datetime);
      //create a notification
      $notification = new Notification();
      $notification->setDatetime($timestamp);
      $notification->setNotified(false);
      $notification->setSnooze(false);
      $notification->setEmail(false);
      $notification->setSms(false);
      $notification->setVoicecall(false);
      $notification->setTask($task);
      $notification->setPrepare($prepareTime);
      $notification->setTravelTime($travelTime);
      $notification->setWCondition($wCondition);
      
     	
     	
      return $notification;
	}
	
	public function pushNotification($user,$message) {
		//$Gnoti = new GtalkNotifications();
		//$Gnoti->sendNotification();
		//tokudu
		//$Tokudu = new Tokudu();
		//$Tokudu->sendNotification($user,$message);
		//UrbanAirship
		$UrbanAirship = new UrbanAirship();
		$UrbanAirship->sendNotification($user,$message);
		//sms
//		$Sms = new Sms();
//		$Sms->sendNotification($user,$message);
	}
}