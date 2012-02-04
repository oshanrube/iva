<?php
namespace Acme\NewsBundle\Library\Includes;
use Acme\NewsBundle\Entity\News;

class Adaderana {
	private $doctrine;
	
	public function __construct($doctrine) {
		$this->doctrine = $doctrine;
	}
	
	public function getTodaysNews($location) {
		$News = $this->doctrine->getRepository('AcmeNewsBundle:News');
		$em = $this->doctrine->getEntityManager();
		//check in database
		if($w = $News->findOneByDatetimeAndLocation($location)){
			return $w;
		}
      //return 
		return $Adaderana->getTodaysNews($location);
	}
	public function updateNews() {
		$News = $this->doctrine->getRepository('AcmeNewsBundle:News');
		$em = $this->doctrine->getEntityManager();
		//load rss feed
		$doc = new \DOMDocument();
		$doc->load( 'http://www.adaderana.lk/rss.php' );
		//get all items
		$items = $doc->getElementsByTagName( "item" );
		//loop thro
		foreach($items as $item){
			$title = $item->getElementsByTagName( "title" )->item(0)->nodeValue;
			if(!$News->findOneByTitle($title)){
				$news = new News();
				$news->setTitle($title);
				$news->setDatetime( strtotime($item->getElementsByTagName( "pubDate" )->item(0)->nodeValue) );
				$news->setDescription( $item->getElementsByTagName( "description" )->item(0)->nodeValue );
				//retrive location from news and category is still to be implimented
				$news->setLocation( 'Colombo' );
				$em->persist($news);
			}
		}
		$em->flush();
		return true;
	}
}