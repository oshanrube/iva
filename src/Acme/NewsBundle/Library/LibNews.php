<?php
namespace Acme\NewsBundle\Library;
use Acme\NewsBundle\Library\Includes\Adaderana;
use Acme\NewsBundle\Library\Includes\GoogleNews;

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
			//adaderana
			$Adaderana = new Adaderana($this->em);
      	//update 
			$Adaderana->updateNews();
		} elseif(empty($location)) 
			$location = 'Colombo';
		//GoogleNews
		echo "loading news for ".$location."\n";
		$GoogleNews = new GoogleNews($this->em);
		return $GoogleNews->updateNews($location);
	}
}