<?php
namespace Acme\LearningBundle\Library;

class LibGeo {
	public static function getDistanceBetweenPoints($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Km') { 
		$theta = $longitude1 - $longitude2; 
		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) 
						+ (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
		$distance = acos($distance); $distance = rad2deg($distance); 
		$distance = $distance * 60 * 1.1515; 
		switch($unit) { 
			case 'Mi': 
				break; 
			case 'Km' : 
				$distance = $distance * 1.609344; 
		} 
		return (round($distance,2)); 
	}
	public static function getMedianSpeed($userDistance,$avgTime) {
		//loop throug get average difference - eliminate all above difference - get the median
		//get avarage difference
		sort($userDistance);
		$count = count($userDistance); //total numbers in array
	   $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
	   if($count % 2) { // odd number, middle is the median
	     	$median = $userDistance[$middleval];
	   } else { // even number, calculate avg of 2 medians
	     	$low = $userDistance[$middleval];
			$high = $userDistance[$middleval+1];
			$median = (($low+$high)/2);
		}
		//convert median to speed
		//speed = dist/time
		$speed = $median / ($avgTime/3600);
		return $speed;
	}
}