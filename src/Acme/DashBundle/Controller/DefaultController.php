<?php

namespace Acme\DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Entity;
use Acme\TaskBundle\Library\Decode;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AcmeDashBundle:Default:index.html.twig');
    }
    
    public function ajaxAction()
    {
		//get tasks
		$Task = $this->getDoctrine()->getRepository('AcmeTaskBundle:Task');
		$user = $this->get('security.context')->getToken()->getUser();
		$timeline = $Task->findByThisMonth($user);
		$timeline = Decode::getCalendar($timeline);
		//var_dump($timeline);exit();
		//create template
    	return $this->render('AcmeDashBundle:Default:panel.html.php', array('timeline' => $timeline));
    }
}