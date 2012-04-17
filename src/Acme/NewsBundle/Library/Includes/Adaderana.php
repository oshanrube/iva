<?php
namespace Acme\NewsBundle\Library\Includes;
use Acme\NewsBundle\Entity\News;
use Acme\TaskBundle\Library\Log;
use Acme\ScheduleBundle\Entity\Schedule;

class Adaderana {
	private $em;
	
	public function __construct($em) {
		$this->em = $em;
	}
	
	public function getTodaysNews($location) {
		$News = $this->em->getRepository('AcmeNewsBundle:News');
		//check in database
		if($w = $News->findOneByDatetimeAndLocation($location)){
			return $w;
		} else {
			//shedule a update
			$schedule = new Schedule();
			$schedule->setDatetime(time());
			$schedule->setCommand('weather:update');
			$schedule->setArguments('location:'.$location);
			// saving the task to the database 
			$this->em->persist($schedule);
			$this->em->flush();
			//empty news 
			$news = new News();
			$news->setTitle('No news updates found,please check again later');
			return array($news);
		}
		Log::err('adaDerana','News update failed');
      //return 
		return false;
	}
	public function updateNews() {
		$News = $this->em->getRepository('AcmeNewsBundle:News');
		//load rss feed
		$doc = new \DOMDocument();
		$doc->load( 'http://www.adaderana.lk/rss.php' );
		//get all items
		$items = $doc->getElementsByTagName( "item" );
		//loop thro
		foreach($items as $item) {
			$title = $item->getElementsByTagName( "title" )->item(0)->nodeValue;
			echo $title."\n";
			if(!$News->findOneByTitle($title)){
				$news = new News();
				$news->setTitle($title);
				$news->setDatetime( strtotime($item->getElementsByTagName( "pubDate" )->item(0)->nodeValue) );
				$news->setDescription( $item->getElementsByTagName( "description" )->item(0)->nodeValue );
				//retrive location from news and category is still to be implimented
				$news->setLocation( 'Colombo' );
				$this->em->persist($news);
			}
		}
		$this->em->flush();
		return true;
	}
}