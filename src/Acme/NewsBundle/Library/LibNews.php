<?php
namespace Acme\NewsBundle\Library;
use Acme\NewsBundle\Library\Includes\Adaderana;

class LibNews{
	
	private $em;
	
	public function __construct($em) {
		$this->em = $em;
	}
	
	public function getTodaysNews($location) {
		$Adaderana = new Adaderana($this->em);
      //return 
		return $Adaderana->getTodaysNews($location);
	}
	//load new news to database
	public function UpdateNews($location) {
		if($location == 'Colombo'){
			$Adaderana = new Adaderana($this->em);
      	//return 
			return $Adaderana->updateNews();
		}
	}
}