<?php
namespace Acme\NewsBundle\Library;
use Acme\NewsBundle\Library\Includes\Adaderana;

class LibNews{
	
	private $doctrine;
	
	public function __construct($doctrine) {
		$this->doctrine = $doctrine;
	}
	
	public function getTodaysNews($location) {
		$Adaderana = new Adaderana($this->doctrine);
      //return 
		return $Adaderana->getTodaysNews($location);
	}
	//load new news to database
	public function UpdateNews() {
		$Adaderana = new Adaderana($this->doctrine);
      //return 
		return $Adaderana->updateNews();
	}
}