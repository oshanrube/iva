<?php
// src/Acme/DemoBundle/Command/NotificationsCreateCommand.php
namespace Acme\NotificationsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\NotificationsBundle\Library\LibNotification;

class NotificationsCreateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('notifications:create')
            ->setDescription('Update the notifications')
            //->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            //->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
    	$libNotification = new LibNotification($em); 
    	//get the exsisting tasks which does not have notifications
    	$tasks = $em->getRepository('AcmeTaskBundle:Task')
            		->findByNotNotified();
      //loop through each task
			foreach($tasks as $task){
				//process and get notification
				$noti = $libNotification->getNotification($task);
				//save to db
				$em->persist($noti);
				$output->writeln('loading task:'.$task->getId());
			}
		$em->flush();
      $output->writeln('Done');
    }
}