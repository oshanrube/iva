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
use Acme\LearningBundle\Entity\LearnUserLocation;
use Acme\ScheduleBundle\Entity\Schedule;

class TaskModel{
	//Entity Manager
	private $em;
	private $question,$description,$suggestions,$requestTask,$quickTask,$venues,$tasks;
	
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
	public function getTasks() {
		if(isset($this->tasks)){
			return $this->tasks;
		} else {
			return array();
		}
	}
	
	public function AddNewTask(Request $request,$user)
	{	
$time_start = microtime();
			//flag variable initialize
			$task = new Task();
			$this->requestTask= $request->request->get('task');
			$this->quickTask 	= $request->request->get('task');
			$lng 					= $request->request->get('lng');
			$lat 					= $request->request->get('lat');
			$locId 				= $request->request->get('loc_id');
			$taskPriority 		= $request->request->get('highPriority');
Log::bench('AddNewTask',$time_start,'variable initialize');$time_start = microtime();
			$this->quickTask 	= Language::improveSentence($this->quickTask);
Log::bench('AddNewTask',$time_start,'improveSentence'); $time_start = microtime();

			/*********************/
			/*Time****************/
			/*********************/
			//get time
			$startTime = Decode::getDateTime($this->quickTask);
			if($startTime == 0){
				$this->question = 'Hey system couldnt figure out the "when" part(Time), please help out!!';
				return false;
			} else {
				$task->setStartTime($startTime);
			}
			 				
			/*********************/
			/*Location************/
			/*********************/
			//get user locations
			$userLocations = $this->em->getRepository('AcmeLearningBundle:LearnUserLocation')
            				->findByUserId($user->getId());
			//check for location id
			if($locId != ''){
				$location = new Location();
				$taskLocation = $location->getLocation($locId);
				//set location
				$task->setLocation($taskLocation->name);
				$task->setLng($taskLocation->location->lng);
				$task->setLat($taskLocation->location->lat);
				//search for locations in the text
			} elseif($locations = Language::getEasyLocation($this->quickTask,$userLocations)) {
				if(!$lng || !$lat){
					if($_SERVER['REMOTE_ADDR'] == '192.168.1.100'){$_SERVER['REMOTE_ADDR'] ='112.134.98.178'; }
					$rec = geoip_record_by_name ($_SERVER['REMOTE_ADDR']);
					$lng = $rec["longitude"];
					$lat = $rec["latitude"];
					$accurate=false;
				} else {$accurate=true;}
				//search the locations list and get alternative sentences
				$location = new Location();
				//if its a user location
				if(count($locations) == 1 && isset($locations['userlocation'])){
					$task->setLocation($locations['userlocation']->getTitle());
					$task->setLng($locations['userlocation']->getLng());
					$task->setLat($locations['userlocation']->getLat()); 
				} elseif(!$taskLocation = $location->searchLocation($this->quickTask,$locations,$lng,$lat,$accurate,$suggestions = true)){
					//add to suggetions
					$this->suggestions = $location->improveSentence();
					//add Venues
					$this->venues = $location->getVenues();
					$this->question = 'Hey system couldnt figure out the "Where" part(Location), please help out from the map!!';
					return false;
				} else {
					$task->setLocation($taskLocation->name);
					$task->setLng($taskLocation->location->lng);
					$task->setLat($taskLocation->location->lat); 
				}
			} else {
				$this->question = 'Hey system couldnt figure out the "Where" part(Location), please help out!!';
				return false;
			}
			
			/*********************/
			/*Calendar************/
			/*********************/
			
			if($calendarName = Decode::getCalendarName($this->quickTask)){
				$calendar = $this->em->getRepository('AcmeTaskBundle:Calendar')
            				->findOneByCalendarName($calendarName,$user);
            $task->setCalendar($calendar[0]);
			} else {
				$calendar = $this->em->getRepository('AcmeTaskBundle:Calendar')
            				->findOneByTitle('default');
            $task->setCalendar($calendar);
			}
			
			/*********************/
			/*Task****************/
			/*********************/
			
			// fill  the task
				$CleanedTask = Language::removePronouns($this->requestTask);
				$CleanedTask = Decode::removeTime($CleanedTask);
				$CleanedTask = Decode::removeLocation($CleanedTask,$task->getLocation());
				if(!$tsk = Decode::getTask($CleanedTask)){
					$this->question = 'Hey system couldnt figure out the "What" part(Task), please help out!!';
					return false;
				} 
				$task->setTask($tsk);
				
			/*********************/
			/*Task Type***********/
			/*********************/
			 $taskTypeRepo = $this->em->getRepository('AcmeTaskBundle:TaskType');
				if(!$taskType = Decode::getTaskType($tsk, $taskTypeRepo))//other task type
					$taskType = $taskTypeRepo->findOneByTitle('Other');
				
				$Endtime = Decode::getEndtime($taskType,$startTime,$this->quickTask);
				$task->setEndtime($Endtime);
				if(!$Endtime)
					$Endtime = strtotime('+1Day', $startTime);
		
				//check for available time
				$this->tasks = $this->em->getRepository('AcmeTaskBundle:Task')
							->findByCurrentStartTime($user,$startTime,$Endtime,$taskPriority);
				//if tasks
				if($this->tasks){
					$lvl = 0;
					//get the highest priority
					foreach($this->tasks as $tsk){
						if($tsk->getTaskPriority()->getLevel() > $lvl){
							$lvl = $tsk->getTaskPriority()->getLevel();
						}
					}
					$lvl++;
					$this->question = 'Hey you already have assigned that time for the following, Mark this high priority?<span id="markPriority" class="nav" onClick="moveHighPriority('.$lvl.')">Yes</span>';
					return false;
				}
				
			/*********************/
			/*Task extras*********/
			/*********************/
				$task->setUserId($user->getId());
				$task->setTaskType($taskType);
				
			
			/*********************/
			/*Task Defaults*******/
			/*********************/
				$taskRepeat = $this->em->getRepository('AcmeTaskBundle:TaskRepeat')->findOneByTitle('No Repeat');
				$task->setTaskRepeat($taskRepeat);
				$TaskColour = $this->em->getRepository('AcmeTaskBundle:TaskColour')->findOneByColour('Default');
				$task->setTaskColour($TaskColour);
				$TaskPriority = $this->em->getRepository('AcmeTaskBundle:TaskPriority')->findOneByDescription('No Priority');
				$task->setTaskPriority($TaskPriority);
				
			/*********************/
			/*Task Description****/
			/*********************/
				//create description
				$desc = Language::CreateDescription($task);
				$this->description = $desc;
				$task->setDescription($desc);
				
			/*********************/
			/*Save****************/
			/*********************/
				// saving the task to the database 
				$this->em->persist($task);
				//shedule a update
				$schedule = new Schedule();
				$schedule->setDatetime(time());
				$schedule->setCommand('notifications:create');
				$schedule->setArguments('');
				// saving the task to the database 
				$this->em->persist($schedule);
				$this->em->flush();
			//finish
		return true;
	}

	public function addFacebookEvent($user,$event) {
		//add the task
		$task = new Task();
		$task->setTask($event->name);
		$task->setDescription('http://www.facebook.com/events/'.$event->id);
		$task->setStartTime(strtotime($event->start_time));
		$task->setEndtime(strtotime($event->end_time));
		$taskRepeat = $this->em->getRepository('AcmeTaskBundle:TaskRepeat')->findOneByTitle('No Repeat');
		$task->setTaskRepeat($taskRepeat);
		//
		$locations = array($event->location);
		$lng = $user->getLng();
		$lat = $user->getLat();
		//search location 
		$location = new Location();
		if(!$taskLocation = $location->searchLocation('',$locations,$lng,$lat,$accurate = false)){
			//add Venues
			$venues = $location->getVenues();
			if(isset($venues[0])){
				//get the best result
				$task->setLocation($venues[0]->name);
				$task->setLng($venues[0]->lng);
				$task->setLat($venues[0]->lat);
			} else {
				$task->setLocation("");
				$task->setLng(0);
				$task->setLat(0);
			}
		} else {
			$task->setLocation($taskLocation->name);
			$task->setLng($taskLocation->location->lng);
			$task->setLat($taskLocation->location->lat); 
		}
		
		//task type
		$taskType = Decode::getTaskType($event->name,$this->em->getRepository('AcmeTaskBundle:TaskType'));
		if(!$Endtime = Decode::getEndtime($taskType,strtotime($event->start_time),$event->name)){
			//all day event
			$taskType = $this->em->getRepository('AcmeTaskBundle:TaskType')->findOneByTitle('All Day');
		}
		$task->setTaskType($taskType);
		//add the task
		$task->setUserId($user->getId());
		//get calendar
		$fbcalendar = $this->em->getRepository('AcmeTaskBundle:Calendar')->findOneByTitle('Facebook-events');
		if(!$fbcalendar){//if such calendar does not exsist creat one
			$fbcalendar = new Calendar();
			$fbcalendar->setTitle('Facebook-events');
			$fbcalendar->setEnabled(true);
			$fbcalendar->setDescription('Events synced from facebook');
			$fbcalendar->setOwnerId($user->getId());
			$fbcalendar->setPrivacyType('private');
			$this->em->persist($fbcalendar);
			$this->em->flush();
		}
		$task->setCalendar($fbcalendar);
		$taskRepeat = $this->em->getRepository('AcmeTaskBundle:TaskRepeat')->findOneByTitle('No Repeat');
		$task->setTaskRepeat($taskRepeat);
		$TaskColour = $this->em->getRepository('AcmeTaskBundle:TaskColour')->findOneByColour('Default');
		$task->setTaskColour($TaskColour);
		$TaskPriority = $this->em->getRepository('AcmeTaskBundle:TaskPriority')->findOneByDescription('No Priority');
		$task->setTaskPriority($TaskPriority);
		//search for the task
		$tsk = $this->em->getRepository('AcmeTaskBundle:Task')->findOneByTitleandTime($task->getTask(),$task->getStartTime());
		if(!$tsk){
			$this->em->persist($task);
			$this->em->flush();
		}
	}
	public function addFacebookBirthday($user,$profile) {
		//add the task
		$task = new Task();
		$task->setTask($profile->name.'\'s Birthday');
		$task->setDescription('It\'s '.$profile->name.'\'s Birthday');
		$task->setStartTime(strtotime($profile->birthday));
		$task->setEndtime(0);
		$task->setLocation('');
		$task->setLng(0);
		$task->setLat(0);
		$task->setUserId($user->getId());
		//task type to bday
		$taskType = $this->em->getRepository('AcmeTaskBundle:TaskType')->findOneByTitle('Birthday');
		$task->setTaskType($taskType);
		//task repeat to anual
		$taskRepeat = $this->em->getRepository('AcmeTaskBundle:TaskRepeat')->findOneByTitle('Yearly');
		$task->setTaskRepeat($taskRepeat);
		//get calendar
		$fbcalendar = $this->em->getRepository('AcmeTaskBundle:Calendar')->findOneByTitle('Facebook-Birthdays');
		if(!$fbcalendar){//if such calendar does not exsist creat one
			$fbcalendar = new Calendar();
			$fbcalendar->setTitle('Facebook-Birthdays');
			$fbcalendar->setEnabled(true);
			$fbcalendar->setDescription('Birthdays synced from facebook');
			$fbcalendar->setOwnerId($user->getId());
			$fbcalendar->setPrivacyType('private');
			$this->em->persist($fbcalendar);
			$this->em->flush();
		}
		$task->setCalendar($fbcalendar);
		$TaskColour = $this->em->getRepository('AcmeTaskBundle:TaskColour')->findOneByColour('Default');
		$task->setTaskColour($TaskColour);
		$TaskPriority = $this->em->getRepository('AcmeTaskBundle:TaskPriority')->findOneByDescription('No Priority');
		$task->setTaskPriority($TaskPriority);
		//search for the task
		$tsk = $this->em->getRepository('AcmeTaskBundle:Task')->findOneByTitleandTime($task->getTask(),$task->getStartTime());
		if(!$tsk){
			$this->em->persist($task);
			$this->em->flush();
		}
	}
}













