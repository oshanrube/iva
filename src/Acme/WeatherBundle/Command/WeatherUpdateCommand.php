<?php
namespace Acme\WeatherBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\WeatherBundle\Library\Includes\Googleweather;

class WeatherUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('weather:update')
            ->setDescription('Update the Weather')
            ->addArgument('location', InputArgument::OPTIONAL, 'Colombo')
            //->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
    	//
    	$Gweather = new Googleweather($em);
      //return 
		$Gweather->update( $input->getArgument('location'));
      $output->writeln('Done');
    }
}