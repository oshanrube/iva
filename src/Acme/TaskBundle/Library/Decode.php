<?php

namespace Acme\TaskBundle\Library;
use Acme\TaskBundle\Library\Includes\ProperNouns;
use Acme\TaskBundle\Library\Log;
use Acme\TaskBundle\Library\Language;

class Decode{
	public static function getCalendar($events, $notifications, $year, $month) {
		$calendar = array();
		$timestamp = mktime(0, 0, 0, $month, 1, $year);
		$maxday = date("t",$timestamp);
		for ($i=1; $i<=$maxday; $i++) {
			$today = mktime(0, 0, 0, $month, $i, $year);
			$tomorrow = mktime(0, 0, 0, $month, ($i+1), $year);
			foreach($events as $e){
				if($e->getStartTime() >= $today && $e->getStartTime() < $tomorrow)
				$calendar[($i)]['evnts'][] = $e; 
			}
			foreach($notifications as $n){
				if($n->getDateTime() >= $today && $n->getDateTime() < $tomorrow)
				$calendar[($i)]['noti'][] = $n; 
			}
		}
		return $calendar;
	}
	public static function getDateTime($string) {
		//remove known errors
		$knownErrors = array(' in ',' at ',' this ',' on ');
		$string = strtolower(str_replace($knownErrors,' ',$string));
		//remove non alphabatic characters
		$string = preg_replace("/[^a-zA-Z0-9\s]/", "", $string);
		
		$descriptorspec = array(
		   0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
		   1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
		   2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
		);
		//$text = "tommoro aound 2 in the morning will be a nice day";
		$process = 'ruby '.__DIR__.'/Includes/run.rb "'.$string.'"';
		$process = proc_open($process, $descriptorspec, $pipes);
		
		if (is_resource($process)) {
		    // $pipes now looks like this:
		    // 0 => writeable handle connected to child stdin
		    // 1 => readable handle connected to child stdout
		    // Any error output will be appended to /tmp/error-output.txt
		    fwrite($pipes[0], 'hello world');
		    fclose($pipes[0]);
		    $output = stream_get_contents($pipes[1]);
		    fclose($pipes[1]);
		    // It is important that you close any pipes before calling
		    // proc_close in order to avoid a deadlock
		    $return_value = proc_close($process);
		}
		//log
		if($output == 0)
			Log::err('Decode','Time not found in '.$string);
		//check for morning
		if(date('Gi',$output) == '1200' && !preg_match('/12/',$string) && !preg_match('/noon/',$string)) {
			$day = date('d',$output);
			$month = date('m',$output);
			$year = date('Y',$output);
			$output = mktime(0, 0, 0, $month, $day, $year);
		}
		//return 
		return $output;
	}
	public static function getCalendarName($string) {
		preg_match("/to: (.*)/",$string,$matches);
		if(isset($matches[1])){return $matches[1];}
		else {return false;}
	}
	public static function removeTime($task){
		preg_match_all("/[1-z]*/",$task,$matches);
		foreach($matches[0] as $key => $value){
			if(strtotime($value)){
				unset($matches[0][$key]);
			}
		}
		return implode(' ',$matches[0]);
	}
	public static function removeLocation($task,$location) {
		//remove extra spaces
		$task = preg_replace("/\s\s+/"," ",$task);
		return preg_replace("/".$location."/si",'',$task);	
	}
	public static function getTask($task) {
		/******************************************************/
		/*dissmissed because it only takes words with capitals*/
		/******************************************************/
		//create instance from pronous class
		//$pn = new ProperNouns();
		//get array with proper nouns
		//$str = implode('',$pn->get($task));
		if($task != ''){
			//remove extra spaces
			$task = preg_replace("/\s\s+/"," ",$task);
			$task = Language::improveSentence($task);
			$task = preg_replace("/^\s/","",$task);
			$task = preg_replace("/\s$/","",$task);
			$task = ucfirst(strtolower($task));
			return $task;
		}
		return '';
	}
	
	public static function getTaskType($task,$taskTypeRepo) {
		//get all task types
		$taskTypes = $taskTypeRepo->findAll();
		
		foreach($taskTypes as $taskType){
			if(preg_match("/".$taskType->getTitle()."/i",$task)) {
				return $taskType;
			}
		}
		return $taskTypeRepo->findOneByTitle("Other");
	}
	
	public static function getEndtime($tasktype,$startTime,$task) {
		//check all day event
		if(date('Hi', $startTime) == 0000 && !preg_match('/12/',$task) && !preg_match('/noon/',$task)){
			return false;
		}
		//if specified time
		return strtotime('+'.$tasktype->getDuration().'Minutes', $startTime);
	}
}