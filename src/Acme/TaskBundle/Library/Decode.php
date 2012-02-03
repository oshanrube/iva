<?php

namespace Acme\TaskBundle\Library;
use Acme\TaskBundle\Library\Includes\ProperNouns;

class Decode{
	function isDate($datetime) {
		//year:month:day hh:mm:ss
		$date = split(' ', $datetime);
		$date = split(':', $date[0]);
		$times = split(':', $date[1]);
		foreach($date as $day){
			if(!is_numeric($day)){
				return false;
			}
		}
		foreach($times as $time){
			if(!is_numeric($time)){
				return false;
			}
		}
		if($times[0]>24 || $times[0]<0)
			return false;
		elseif($times[1]>60 || $times[1]<0)
			return false;
		elseif($times[2]>60 || $times[2]<0)
			return false;
		elseif(checkdate ((int) $date[1] ,(int) $date[2] ,(int) $date[0] ))
		{
			return true;
		}
		return false;
	}
	public static function getThisDate($string) {
		if(strlen($string)>64)return -3;
		if(is_numeric($string)) {//num of days
			return date("Y:m:d H:i:s",strtotime(date("Y:m:d H:i:s") . " +$string days"));
		}
		else {
			/*$string = strtolower($string);
			if(preg_match('/last/',$string))return "i think ppl put todo notes for past :P";	
			$days_of_week = array('/next monday/'=>'next monday','/next tuesday/'=>'next tuesday','/next wednesday/'=>'next wednesday','/next thursday/'=>'next thursday','/next friday/'=>'next friday','/next saturday/'=>'next saturday','/next sunday/'=>'next sunday','/next month/'=>'next month','/next year/'=>'next year'
			,'/coming monday/'=>'next monday','/coming tuesday/'=>'next tuesday','/coming wednesday/'=>'next wednesday','/coming thursday/'=>'next thursday','/coming friday/'=>'next friday','/coming saturday/'=>'next saturday','/coming sunday/'=>'next sunday','/coming month/'=>'next month','/coming year/'=>'next year'
			,'/monday/'=>'monday','/tuesday/'=>'monday','/wednesday/'=>'monday','/thursday/'=>'monday','/friday/'=>'monday','/saturday/'=>'monday','/sunday/'=>'monday','/month/'=>'monday','/year/'=>'monday','/weekend/'=>'saturday','/week end/'=>'saturday'
			);
			foreach($days_of_week as $day => $value){
				if(preg_match($day, $string)){
				return date("Y:m:d H:i:s",strtotime($value));}
			}
			$days_of_week = array('/tomoro/'=>'1','/day after tomoro/'=>'2');
			foreach($days_of_week as $day => $value){
				if(preg_match($day, $string))
				return date("Y:m:d H:i:s",strtotime(date("Y:m:d H:i:s") . " +$value days"));
			}*/
			$exclude = array('i', 'at');  
				$parse_array = explode(" ", $string);  
				$date = array();  
				$data['text'] = array();  
				$word_count = count($parse_array);  
				for($i = 0; $i < $word_count; $i++) {  
				if (strtotime($parse_array[$i]) > 0 && !in_array($parse_array[$i], $exclude)) {  
				$date[] = $parse_array[$i];  
				} else {  
				$data['text'][] = $parse_array[$i];  
				}  
				}  
				$data['date'] = strtotime(implode(" ", $date));
				echo date("Y:m:d H:i:s",$data['date']);  
			return "couldnt find the date";
		}
	}
	//echo date("Y:m:d H:i:s","2011:10:08 05:12:01");
	//echo getThisDate('gotta go smewhre next sunday');
	function createTodo($userId,$title,$due_to=NULL){
		if(!$due_to)$due_to = date("Y:m:d H:i:s");
		if(!is_numeric($userId) || !isDate($due_to)) {
				return -2;
		}
		$content = mysql_real_escape_string($content);
		if(strlen($content)>64)return -3;
		$query="INSERT INTO `todolist` (`todo_id`, `user_id`, `parent_id`, `title`,`created`,`due_to`) VALUES (NULL, '$userId', '0', '$title',NOW(),'$due_to');";
		$result = mysql_query($query);
		if (!$result) {
		    return 'Invalid query: ' .$query. mysql_error();
		}
		return 1;
	}
	function deleteTodo($todo_id){
		$query="DELETE FROM `todolist` WHERE `todo_id` = '$todo_id';";
		$result = mysql_query($query);
		if (!$result) {
		    return 'Invalid query: ' . mysql_error();
		}
		return 1;
	}
	function addTodo($todo_id,$userId,$content,$due_to){
		if(!is_numeric($todo_id) || !is_numeric($userId) || !isDate($due_to)) {
				return -2;
		}
		$content = mysql_real_escape_string($content);
		if(strlen($content)>64)return -3;
		$query="INSERT INTO `todolist` (`todo_id`, `user_id`, `parent_id`, `title`) VALUES (NULL, '$userId', '$todo_id', '$content',NOW(),'$due_to');";
		$result = mysql_query($query);
		if (!$result) {
		    return 'Invalid query: ' . mysql_error();
		}
		return 1;
	}
	function removeTodo($todo_id){
		if(!is_numeric($todo_id) || !is_numeric($userId) || !isDate($due_to)) {
				return -2;
		}
		$content = mysql_real_escape_string($content);
		$query="DELETE FROM `todolist` WHERE `todo_id` = '$todo_id';";
		$result = mysql_query($query);
		if (!$result) {
		    return 'Invalid query: ' . mysql_error();
		}
		return 1;
	}
	function getTodoList($user_id) {
		if(!is_numeric($userId)) {
				return -2;
		}
		$query="SELECT * FROM `todolist` WHERE `user_id` = '$user_id';";
		$result = mysql_query($query);
		if(!$result)return false;
		while($row = mysql_fetch_object($result)){
			$rows[] = $row;
		}
		return $rows;
	}
	function getTodoItems($parent_id) {
		if(!is_numeric($parent_id)) {
				return -2;
		}
		$query="SELECT * FROM `todolist` WHERE `parent_id` = '$parent_id';";
		$result = mysql_query($query);
		if(!$result)return false;
		while($row = mysql_fetch_object($result)){
			$rows[] = $row;
		}
		return $rows;
	}
	function setTodoItem($todo_id,$status = 1) {
		if(!is_numeric($todo_id) || !is_numeric($status) || ($status<1 && $status>0)) {
				return -2;
		}
		$query="UPDATE  `todolist` SET  `status` =  '$status' WHERE `todo_id` ='$todo_id';";
		$result = mysql_query($query);
		if (!$result)return false;
		return true;
	}
	public static function getDateTime($string) {
		$knownErrors = array(' in ',' at ',' this ',' on ');
		$string = strtolower(str_replace($knownErrors,' ',$string));
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
		    //echo 'ruby '.__DIR__.'/run.rb "'.$string.'"';//exec('pwd');
		    //echo "command returned $return_value\n";
		    //var_dump();
		    //echo date("F j, Y, g:i a",$output);
		}
		return $output;
	}
	public static function getCalendarName($string) {
		preg_match("/to (.*)/",$string,$matches);
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