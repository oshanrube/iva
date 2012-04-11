<?php
// src/Acme/DemoBundle/Command/LearningTravelCommand.php
namespace Acme\LearningBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\LearningBundle\Library\LibGeo;

class LearningTravelCommand extends ContainerAwareCommand
{
	private $speedTolerrence = 0.5;//50%
    protected function configure()
    {
        $this
            ->setName('learning:travel')
            ->setDescription('Update the travel speeds')
            //->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            //->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
    	//get the user travel records
    	$travelRecords = $em->getRepository('AcmeLearningBundle:LearnTravel')
    							->findAll();
		//foreach record
    	foreach($travelRecords as $travelRecord){
    		//split the record to points
    		$points = explode('::',$travelRecord->getRoute());
    		//if there are less than 2 points 
    		if(count($points) < 2)continue;
    		for($x = 1;$x < count($points);$x++){
    			//split the points to cords
    			$tmp1 	= explode('=', $points[$x-1]);
    			$cords 	= explode(',', $tmp1[1]);
    			$tmp2 	= explode('=', $points[$x]);
    			$dest 	= explode(',', $tmp2[1]);
    			//calculate distance
    			$time[] = $tmp2[0] - $tmp1[0]; 
    			$distances[] = LibGeo::getDistanceBetweenPoints($cords[0], $cords[1], $dest[0], $dest[1]);
    		}
    		//loop throug get average difference - eliminate all above difference - get the average
    		$avgTime = array_sum($time) / count($time);
    		$speed = LibGeo::getMedianSpeed($distances,$avgTime);
    		//get user 
    		$user = $em	->getRepository('AcmeUserBundle:User')
							->findOneById($travelRecord->getUserId());
			//get user avarage speed
			$avgSpeed = $user->getAvgspeed();
    		//if the new speed is between tolerence level
    		$tolerence = ($avgSpeed * $this->speedTolerrence);
    		if( $speed < ($avgSpeed+$tolerence) && $speed > ($avgSpeed-$tolerence) ) {
    			//update user 
    			$user->setAvgspeed($speed);
    			$em->persist($user);
				$em->flush();
				$output->writeln('Update user'.$user->getId().' avarage speed to '.$speed);
    		}
    		$output->writeln('speed'.$speed);
    		unset($time);unset($distances);
		}
      $output->writeln('Done');
    }
}