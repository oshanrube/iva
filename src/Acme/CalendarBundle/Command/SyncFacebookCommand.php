<?php
namespace Acme\CalendarBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\TaskBundle\Entity\Calendar;
use Acme\CalendarBundle\Library\Sync;

class SyncFacebookCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('calendar:syncfacebook')
            ->setDescription('Sync with facebook calendar')
            ->addArgument('username', InputArgument::OPTIONAL)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
    	//username
    	$username = $input->getArgument('username');
    	//get user
    	$user = $em->getRepository('AcmeUserBundle:User')->findOneByUsername($username);
    	if(!$user){ $output->writeln('Invalid Username: '.$username); exit(); }
    	//facebook link
		$sync = new Sync($em);
		$status = $sync->syncFacebook($user);
		//if there is a sync error 
		if(!$status){
			$user->setFbToken('error');
			$em->persist($user);
			$em->flush();
		}
		//return 
      $output->writeln('Sync Facebook Compleate');
    }
}