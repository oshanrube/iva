<?php
namespace Acme\NotificationsBundle\Library;

use Acme\NotificationsBundle\Library\Includes\GoogleGeocoding;

class LibLocation{
	
	//Entity Manager
	private $em;
	
	public function __construct($em) {
		$this->em = $em;
	}
	public function getLocation($lat,$lng) {
		$GGeocoding = new GoogleGeocoding($this->em);
      //return 
		return $GGeocoding->getLocation($lat,$lng);
	}
	
}