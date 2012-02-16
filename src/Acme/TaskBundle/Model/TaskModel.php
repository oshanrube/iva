<?php

namespace Acme\TaskBundle\Model;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Entity\TaskType;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Library\Decode;
use Acme\TaskBundle\Library\Language;
use Acme\TaskBundle\Library\Location;
use Acme\TaskBundle\Library\Log;

class TaskModel{
	//Entity Manager
	private $em;
	private $question,$description,$suggestions,$requestTask,$quickTask,$venues;
	
	public function __construct($em) {
		$this->em = $em;
	}
	
	public function getQuestion() {
		if(isset($this->question)){
			return $this->question;
		} else { return '';}
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function getSuggestions() {
		if(isset($this->suggestions)) {
			return "'".implode("','",$this->suggestions)."'";
		} else {return '';}
	}
	public function getDidyoumean() {
		if($this->requestTask != $this->quickTask){
			return $this->quickTask;
		} else {
			return '';
		}
	}
	public function getVenues() {
		if(isset($this->venues)){
			return $this->venues;
		} else {
			return array();
		}
	}
	
	public function AddNewTask(Request $request,$user)
	{	
$time_start = microtime();
			//flag variable initialize
			$task = new Task();
			$this->requestTask 		= $request->request->get('task');
			$this->quickTask 	= $request->request->get('task');
			$lng 					= $request->request->get('lng');
			$lat 					= $request->request->get('lat');
			$locId 				= $request->request->get('loc_id');
Log::bench('AddNewTask',$time_start,'variable initialize');$time_start = microtime();
			$this->quickTask 	= Language::improveSentence($this->quickTask);
Log::bench('AddNewTask',$time_start,'improveSentence'); $time_start = microtime();
			//get time
			$startTime = Decode::getDateTime($this->quickTask);
			if($startTime == 0){
				$this->question = 'Hey system couldnt figure out the "when" part(Time), please help out!!';
				return false;
			} else {
				$task->setStartTime($startTime);
			}
			
			//get location
			//check for location id
			if($locId != ''){
				$location = new Location();
				$taskLocation = $location->getLocation($locId);
				//set location
				$task->setLocation($taskLocation->name);
				$task->setLng($taskLocation->location->lng);
				$task->setLat($taskLocation->location->lat);
				//search for locations in the text
			} elseif($locations = Language::getEasyLocation($this->quickTask)) {
				if(!$lng || !$lat){
					if($_SERVER['REMOTE_ADDR'] == '192.168.1.100'){$_SERVER['REMOTE_ADDR'] ='112.134.98.178'; }
					$rec = geoip_record_by_name ($_SERVER['REMOTE_ADDR']);
					$lng = $rec["longitude"];
					$lat = $rec["latitude"];
					$accurate=false;
				} else {$accurate=true;}
				//search the locations list and get alternative sentences
				$location = new Location();
				if(!$taskLocation = $location->searchLocation($this->quickTask,$locations,$lng,$lat,$accurate)){
					//add to suggetions
					$this->suggestions = $location->improveSentence();
					//add Venues
					$this->venues = $location->getVenues();
					$this->question = 'Hey system couldnt figure out the "Whersssse" part(Location), please help out!!';
					return false;
				} else {
					$task->setLocation($taskLocation->name);
					$task->setLng($taskLocation->location->lng);
					$task->setLat($taskLocation->location->lat); 
				}
			} else {
				$this->question = 'Hey system couldnt figure out the "Where" aaapart(Location), please help out!!';
				return false;
			}
			
			//calendar
			if($calendarName = Decode::getCalendarName($this->quickTask)){
				$calendar = $this->em->getRepository('AcmeTaskBundle:Calendar')
            				->findOneByCalendarName($calendarName,$user);
            $calendarId = $calendar[0]->getId();
            $task->setCalendarId($calendarId);
			} else {
				$task->setCalendarId(0);
			}
			// fill  the task
				$CleanedTask = Language::removePronouns($this->quickTask);
				$CleanedTask = Decode::removeTime($CleanedTask);
				$CleanedTask = Decode::removeLocation($CleanedTask,$taskLocation->name);
				if(!$tsk = Decode::getTask($CleanedTask)){
					$this->question = 'Hey system couldnt figure out the "What" part(Task), please help out!!';
					return false;
				} 
				$taskType = Decode::getTaskType($tsk,$this->em->getRepository('AcmeTaskBundle:TaskType'));
				if(!$Endtime = Decode::getEndtime($taskType,$startTime,$this->quickTask)){
					//all day event
					$taskType = $this->em->getRepository('AcmeTaskBundle:TaskType')->findOneByTitle('All Day');
				}
				//add the task
				$task->setTask($tsk);
				$task->setUserId($user->getId());
				$task->setTaskType($taskType);
				$task->setEndtime($Endtime);
				//create description
				$desc = Language::CreateDescription($task);
				$this->description = $desc;
				$task->setDescription($desc);
			// saving the task to the database 
				$this->em->persist($task);
				$this->em->flush();
			//finish
			return true;
	}
}