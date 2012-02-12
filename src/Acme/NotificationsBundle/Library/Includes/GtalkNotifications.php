<?php
namespace Acme\NotificationsBundle\Library\Includes;

use Acme\NotificationsBundle\Library\Includes\XMPPHP\XMPP;
use Acme\NotificationsBundle\Library\Includes\XMPPHP\Log;

class GtalkNotifications{
	
	private $username = 'oshanrube';
	private $password = 'shaliniwi';//private $password = 'ivaabc@123';
	
	public function __construct(){
		
		
	}
	
	public function sendNotification() {
		$conn = new XMPP('talk.google.com', 5222, $this->username, $this->password, 'xmpphp', 'gmail.com', $printlog=true, $loglevel=Log::LEVEL_INFO);
		$conn->connect();
		$conn->processUntil('session_start');
		$conn->message('drkmafia@gmail.com', 'This is a test message!');
		$conn->disconnect();
	}
}