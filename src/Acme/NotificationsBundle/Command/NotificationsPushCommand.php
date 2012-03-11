<?php
// src/Acme/DemoBundle/Command/NotificationsCreateCommand.php
namespace Acme\NotificationsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\NotificationsBundle\Library\LibNotification;

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
    	//create notification
    	$libNotification = new LibNotification($em);
    	//retrive all the pending notifications at the moment
    	$notifications = $em->getRepository('AcmeTaskBundle:Notification')
    							->findByPendingNotifications();
    	$now = mktime(date("H"), date("i"), 0, date("m"), date("d"), date("Y"));
    	echo 'its : '.$now."\n";						
    	foreach($notifications as $noti){
    		//get user info
    		$userId=$noti->getTask()->getUserId();
    		$user = 	$em->getRepository('AcmeUserBundle:User')
      			->findOneById($userId);
      	//prepair the message
    		$message = 'REMINDER: '.$noti->getTask()->getDescription().' At '.date("D M j G:i:s",$noti->getTask()->getStartTime());	    		 
			//process and SEND notification
			$libNotification->pushNotification($user,$message);
		}
      $output->writeln('Done');
    }
}