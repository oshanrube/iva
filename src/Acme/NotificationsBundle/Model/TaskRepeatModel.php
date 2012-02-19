<?php
namespace Acme\NotificationsBundle\Model;

class TaskRepeatModel{
	
	public static function getNextRepeat($task,$today = null) {
		if(!$today)$today = time();
		$datetime 	= $task->getStartTime();
		$taskRepeat	= $task->getTaskRepeat();
		switch($taskRepeat->getTitle()) {
			case 'Daily':
				$hour = date("H",$datetime);
				$minute = date("i",$datetime);
				$second = date("s",$datetime);
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
				if($day > date('j')){
					return mktime($hour, $minute, $second, date("n",$today), $day, date("Y",$today));
				}
				$newtime = mktime($hour, $minute, $second, date("n",$today)+1, date('j',$today), date("Y",$today));
				return strtotime('next month\'s '.$day,$newtime);
				break;
			case 'Yearly':
				$month = date("n",$datetime);
				$day = date("j",$datetime);
				$hour = date("H",$datetime);
				$minute = date("i",$datetime);
				$second = date("s",$datetime);
				if($month > date('n')){
					return mktime($hour, $minute, $second, $month, $day, date("Y",$today));
				}
				return mktime($hour, $minute, $second, date("n",$today), $day, date("Y",$today)+1);
				break;
		}
	}
	public static function getRepeatFor($event,$start,$end) {
		//start of the month
		$datetime = TaskRepeatModel::getNextRepeat($event,$start);
		while( $datetime < $end ) {
			$event->setStartTime($datetime);
			$cal[] = $event;
			$datetime = TaskRepeatModel::getNextRepeat($event,$datetime); 
		}
		if(isset($cal))
			return $cal;
		else
			return null;
	}	
}


















