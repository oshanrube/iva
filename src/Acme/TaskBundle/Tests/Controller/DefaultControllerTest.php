<?php

namespace Acme\TaskBundle\Tests\Controller;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	protected function getClientWithAuthentication($firewallName, array $options = array(), array $server = array())
	{
      $client = $this->createClient($options, $server);
      $client->getCookieJar()->set(new \Symfony\Component\BrowserKit\Cookie(session_name(), true));

      $token = new UsernamePasswordToken('oshan', 'lomino', $firewallName, array('ROLE_USER'));
      self::$kernel->getContainer()->get('session')->set('_security_' . $firewallName, serialize($token));
      return $client;
	}
	
	public function testIndex()
	{
		//$authClient = new AuthClient();
$client = $this->getClientWithAuthentication('oshan'); 
//var_dump(self::$kernel->getContainer()->get('session'));

//exit();
$client->request('GET', '/member'); 
		echo $client->getResponse()->getContent();exit();
		//
		$this->assertTrue($crawler->filter('form')->count() > 0);
		$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
	}
}