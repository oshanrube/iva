<?php

namespace Acme\TaskBundle\Library;
use Acme\TaskBundle\Library\Includes\ProperNouns;
use Acme\TaskBundle\Library\Log;

class Decode{
	public static function getCalendar($events) {
		$calendar = array();
		$timestamp = mktime(0, 0, 0, date('m'), 1, date('Y'));
		$maxday = date("t",$timestamp);
		for ($i=1; $i<=$maxday; $i++) {
			$today = mktime(0, 0, 0, date('m'), $i, date('Y'));
			$tomorrow = mktime(0, 0, 0, date('m'), ($i+1), date('Y'));
			foreach($events as $e){
				//echo $today.' '.$tomorrow.' '.$e->getDatetime()."\n";
				//echo date("F j, Y",$today).' '.date("F j, Y",$tomorrow).' '.date("F j, Y",$e->getDatetime())."\n";
				if($e->getDatetime() > $today && $e->getDatetime() < $tomorrow)
				$calendar[($i)][] = $e; 
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
		return str_replace(strtolower($location),'',$task);	
	}
	public static function getTask($task) {
		//create instance from pronous class
		$pn = new ProperNouns();
		//get array with proper nouns
		return implode('',$pn->get($task));
		
	}
}