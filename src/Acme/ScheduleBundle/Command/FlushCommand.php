<?php
// src/Acme/DemoBundle/Command/NotificationsCreateCommand.php
namespace Acme\ScheduleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class FlushCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('schedule:flush')
            ->setDescription('flush all the schedules')
            ->addArgument('list', InputArgument::OPTIONAL, 'Only list the items')
            //->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
    	//list the sheduled tasks
    	$shedule = $em->getRepository('AcmeScheduleBundle:Schedule')
    							->findAllTasks();
    	//group by and find last id
    	$tasks[] = array();
    	foreach($shedule as $task){
    		if(!in_array($task->getCommand(),$tasks)){
    			//run the tasks
    			$command = 'php app/console '.$task->getCommand();
    			echo $command."\n";
    			shell_exec($command);
    			$tasks[] = $task->getCommand();
    		}
    		$em->remove($task);
		}
		$em->flush();
      $output->writeln('Done');
    }
}