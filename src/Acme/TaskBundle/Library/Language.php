<?php
namespace Acme\TaskBundle\Library;
use Acme\TaskBundle\Library\Includes\SpellCorrector;
use Acme\TaskBundle\Library\Includes\GoogleLibrary;
use Acme\TaskBundle\Library\Log;

class Language{
	public static function improveSentence($seachText) {
		//check for any spelling errors
		$spell = new SpellCorrector();
		$changes =  $spell->checkSentence($seachText);
		//if its not 0
		if($changes != 0) {
			$googleLibrary = new GoogleLibrary();
			if($googleLibrary->search($seachText)){$seachText = $googleLibrary->correct;}
			else {Log::err('Leanguage','Search Text not found '.$seachText);}
		}
		return $seachText;
	}
	public static function removePronouns($string) {
		$sentence = '';
		preg_match_all("/[1-z]+/",$string,$matches);
		$words = unserialize(file_get_contents(__DIR__.'/pronouns.list.ser'));
		$words = "(".implode('|',$words).")";
		foreach($matches[0] as $word){
			if(!preg_match("/".$word."/i",$words)){//&& !strtotime($word)
				$sentence .= ' '.$word;
			}
		}
		return $sentence;
	}
	public static function getEasyLocation($string,$userLocations) {
		//check for user locations
		foreach($userLocations as $location){
			//check for custom locations
			if(preg_match("/".$location->getTitle()."/i",$string)){
				//if found return
				return array('userlocation' => $location);
			}
		}
		//check for new locations
		$combos = array("at ([1-z]+)","in ([1-z]+)","venue ([1-z]+)");
		$matches = array();
		foreach($combos as $combo){
			preg_match_all("/".$combo."/i",$string,$match);
			$matches = array_merge($matches,$match[1]);
		}
		foreach($matches as $key => $match){
			if(strtotime($match)){
				unset($matches[$key]);				
			}
		}
		return $matches;
	}
	public static function CreateDescription($task) {
		return $task->getTask().' in '.$task->getLocation();
	}
}