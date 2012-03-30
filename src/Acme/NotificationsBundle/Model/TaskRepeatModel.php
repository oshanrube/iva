<?php
namespace Acme\NotificationsBundle\Model;

use Acme\TaskBundle\Library\Log;

class TaskRepeatModel{
	
	public static function getNextRepeat($task,$today = null) {
		if(!$today)$today = time();
		$datetime 	= $task->getStartTime();
		$taskRepeat	= $task->getTaskRepeat();
		
		switch($taskRepeat->getTitle()) {
			case 'Daily':
				return mktime($hour, $minute, $second, date("n",$today), date("j",$today)+1, date("Y",$today));
				break;
			case 'Weekly':
				$hour = date("H",$datetime);
				$minute = date("i",$datetime);
				$second = date("s",$datetime);
				$newtime = mktime($hour, $minute, $second, date("n",$today), date("j",$today), date("Y",$today));
				return strtotime('next '.date("l",$datetime),$newtime);
				break;
			case 'Monthly':
				$day = date("j",$datetime);
				$hour = date("H",$datetime);
				$minute = date("i",$datetime);
				$second = date("s",$datetime);
				if($day > date('j',$today)){
					return mktime($hour, $minute, $second, date("n",$today), $day, date("Y",$today));
				}
				$newtime = mktime($hour, $minute, $second, date("n",$today), $day, date("Y",$today));
				return strtotime('+1 month',$newtime);
				break;
			case 'Yearly':
				$month = date("n",$datetime);
				$day = date("j",$datetime);
				$hour = date("H",$datetime);
				$minute = date("i",$datetime);
				$second = date("s",$datetime);
				$datetime = mktime($hour, $minute, $second, $month, $day, date("Y",$today));
				
				if($datetime >= $today){
					return $datetime;
				} else {
					return strtotime("+1 year",$datetime);
				}
				break;
		}
	}
	public static function getRepeatFor($event,$start,$end) {
		//start of the month
		$datetime = TaskRepeatModel::getNextRepeat($event,$start);
		//echo date('c',$event->getStartTime());exit();
		//echo date('c',$datetime);exit();
		
		while( $datetime < $end ) {
			//clone 
			$ev = $event; 
			$ev->setStartTime($datetime);
			$cal[] = $ev;
			$tmpTime = $datetime; 
			$datetime = TaskRepeatModel::getNextRepeat($event,$datetime);
			if($datetime == $tmpTime)break;
		}
		
		if(isset($cal))
			return $cal;
		else
			return null;
	}	
}