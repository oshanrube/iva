<?php
namespace Acme\NotificationsBundle\Library;

use Acme\NotificationsBundle\Library\LibDistance;
use Acme\TaskBundle\Entity\Notification;

class LibNotification{
	
	private $em;
		
	public function __construct($em) {
		$this->em = $em;
	}
	
	public function getNotification($task) {
		//get location and datetime
		$datetime 	= $task->getDatetime();
		$dest['lat']= $task->getLat();
		$dest['lng']= $task->getLng();
		$userId 		= $task->getUserId();
		$taskId 		= $task->getId();
		//1st get the user
      $user = 	$this->em->getRepository('AcmeUserBundle:User')
      			->findOneById($userId);
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
      $mins = $distance->getTravelTime($origin,$dest,$user);
      //get the notify time
      $timestamp = strtotime(' -'.$mins.' minutes',$datetime);
      //create a notification
      $notification = new Notification();
      $notification->setDatetime($timestamp);
      $notification->setNotified(false);
      $notification->setSnooze(false);
      $notification->setEmail(false);
      $notification->setSms(false);
      $notification->setVoicecall(false);
      $notification->setTask($task);
     	
     	
      return $notification;
	}
}