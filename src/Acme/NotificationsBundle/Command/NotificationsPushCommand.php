<?php
// src/Acme/DemoBundle/Command/NotificationsCreateCommand.php
namespace Acme\NotificationsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\NotificationsBundle\Library\LibNotification;
//use Acme\NotificationsBundle\Library\Twilio;

include __DIR__.'/../Library/Twilio.php';

class NotificationsPushCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
				->setName('notifications:push')
				->setDescription('Push the notifications')
				//->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
				//->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
		$now = mktime(date("H"), date("i"), 0, date("m"), date("d"), date("Y"));
		echo 'its : '.$now."\n";
		//create notification
		$libNotification = new LibNotification($em);
		//
		//LEVEL 1 PUSH
		//
		//retrive all the pending notifications at the moment
		$notifications = $em->getRepository('AcmeTaskBundle:Notification')
								->findByPendingPushNotifications();
		$output->writeln('Loading push notifications: '.count($notifications));
		foreach($notifications as $noti){
			//get user info
			$userId=$noti->getTask()->getUserId();
			$user = 	$em->getRepository('AcmeUserBundle:User')
					->findOneById($userId);
			//process and SEND notification
			$notification = $libNotification->pushNotification($user,$noti, "Push");
			$em->persist($notification);			
		}
		$em->flush();
		//
		//LEVEL 2 SMS
		//
		$notifications = $em->getRepository('AcmeTaskBundle:Notification')
								->findByPendingSMSNotifications();
		$output->writeln('Loading SMS notifications: '.count($notifications));
		foreach($notifications as $noti){
			//get user info
			$userId=$noti->getTask()->getUserId();
			$user = 	$em->getRepository('AcmeUserBundle:User')
					->findOneById($userId);
			//process and SEND notification
			$notification = $libNotification->pushNotification($user,$noti, "SMS");
			$em->persist($notification);
		}
		$em->flush();
		//
		//LEVEL 3
		//
		$notifications = $em->getRepository('AcmeTaskBundle:Notification')
								->findByPendingCallNotifications();
		$output->writeln('Loading backup call notifications: '.count($notifications));
		foreach($notifications as $noti){
			$AccountSid = "AC403828398da640fda9cfbd3dd9c59e9a";
			$AuthToken = "1d8d08ffeb0a2163040403fec73547f7";
		 
			//get user info
			$userId=$noti->getTask()->getUserId();
			$user = 	$em->getRepository('AcmeUserBundle:User')
					->findOneById($userId);
			//
			$url = $this->getContainer()->getParameter('url');
			$url .= $this->getContainer()->get('router')->generate('AcmeNotificationsBundle_call_details', array( 'id' => $noti->getId(), 'confirmId' => $noti->getCallConfirmCode()));
			// Instantiate a new Twilio Rest Client
			$AccountSid = "AC403828398da640fda9cfbd3dd9c59e9a";
   	 	$AuthToken = "1d8d08ffeb0a2163040403fec73547f7";
    		$client = new \Services_Twilio($AccountSid, $AuthToken);
			/*$call = $client->account->calls->create(
				'94776566978', // From this number
				'+'.$user->getBackupPhoneNum(), // Call this number
				$url
			);*/
			echo $url."\n";//exit(); 
			//process and SEND notification
			$noti->setVoicecall(true);
			$em->persist($noti);
		}
		$em->flush();
		$output->writeln('Done');
	}
}