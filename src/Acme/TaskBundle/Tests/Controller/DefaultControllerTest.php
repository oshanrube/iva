<?php

namespace Acme\TaskBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	public function testIndex()
	{
$client = static::createClient(array('debug'       => false), array(
	'PHP_AUTH_USER' => 'oshan',
	'PHP_AUTH_PW'   => 'lomino',
	'HTTP_HOST'       => 'en.example.com',
	'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7',
	'HTTP_ACCEPT'		=>'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
	//'CONTENT_TYPE' => 'application/json',
	//'HTTP_REFERER' => '/foo/bar',
));
$client->request(
	'GET',
	'/member',
	array(),
	array(),
	array(
		'CONTENT_TYPE' => 'application/json',
		'HTTP_REFERER' => '/foo/bar',
	)
);
		echo $client->getResponse()->getContent();exit();
		//
		$this->assertTrue($crawler->filter('form')->count() > 0);
		$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
	}
}
