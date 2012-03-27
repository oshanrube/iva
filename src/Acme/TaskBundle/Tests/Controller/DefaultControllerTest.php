<?php

namespace Acme\TaskBundle\Tests\Controller;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\BrowserKit\Cookie;

class DefaultControllerTest extends WebTestCase
{
	protected function getClientWithAuthentication($firewallName, array $options = array(), array $server = array())
	{
		$client = $this->createClient($options, $server);
		$client->getCookieJar()->set(new Cookie(session_name(), true));

		$token = new UsernamePasswordToken('oshan', 'lomino', $firewallName, array('ROLE_USER'));
		self::$kernel->getContainer()->get('session')->set('_security_' . $firewallName, serialize($token));
		return $client;
	}
	
	protected function createClientWithAuthentication($firewallName, array $options = array(), array $server = array())
	{
		/* @var $client Symfony\Component\BrowserKit\Client */
		$client = $this->createClient($options, $server);
		// has to be set otherwise "hasPreviousSession" in Request returns false.
		$client->getCookieJar()->set(new Cookie(session_name(), true));

		$userManager = self::$kernel->getContainer()->get('fos_user.user_manager'); 
		$user = $userManager->findUserByUsername('root');

		$token = new UsernamePasswordToken($user, null, $firewallName, $user->getRoles());
		self::$kernel->getContainer()->get('session')->set('_security_' . $firewallName, serialize($token));
		self::$kernel->getContainer()->get('security.context')->setToken($token); 

		return $client;
	}
	
	public function testIndex()
	{
$client = $this->createClientWithAuthentication('main');
//$client = $this->createClient();
		$client->followRedirects(true);

		$serviceContainer = self::$kernel->getContainer();
		$router = $serviceContainer->get('router');

		$crawler = $client->request('GET', '/member');
		echo $client->getResponse()->getContent();exit();
		//$this->assertTrue(200 === $adminClient->getResponse()->getStatusCode());
		//
		$this->assertTrue($crawler->filter('form')->count() > 0);
		$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
	}
}