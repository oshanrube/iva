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
            ->setDescription('Update the Weather')
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
		$sync->syncFacebook($user);
		//return 
      $output->writeln('Done');
    }
}