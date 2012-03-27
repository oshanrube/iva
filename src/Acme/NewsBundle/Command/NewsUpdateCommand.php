<?php
namespace Acme\NewsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Acme\NewsBundle\Library\LibNews;

class NewsUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('news:update')
            ->setDescription('Update the News Feed')
            ->addArgument('location', InputArgument::OPTIONAL, 'Colombo')
            //->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em 	= $this->getContainer()->get('doctrine')->getEntityManager();
    	//
    	$output->writeln('Start');
		$LibNews = new LibNews($em);
      //update news 
		$LibNews->updateNews($input->getArgument('location'));
      $output->writeln('Done');
    }
}