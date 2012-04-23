<?php
// src/Acme/DemoBundle/Command/NotificationsCreateCommand.php
namespace Acme\ScheduleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;


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
    		if(!in_array($task->getCommand().' '.$task->getArguments(),$tasks)){
    			//run the tasks
    			$command = $this->getApplication()->find($task->getCommand());
    			$arg = explode(':',$task->getArguments());
			   $arguments = array(
			        'command' => $task->getCommand(),
			        $arg[0]    => $arg[1]
			    );
			
			   $input = new ArrayInput($arguments);
			   echo $command->run($input, $output);
    			$tasks[] = $task->getCommand().' '.$task->getArguments();
    		}
    		$em->remove($task);
		}
		$em->flush();
      $output->writeln('Done');
    }
}