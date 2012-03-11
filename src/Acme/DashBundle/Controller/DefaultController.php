<?php

namespace Acme\DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
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
		$timeline = $Task->findByThisMonth($user,date('Y'),date('m'));
		//get Notifications
		$Notifications = $this->getDoctrine()->getRepository('AcmeTaskBundle:Notification');
		$Notifications_timeline = $Notifications->findByThisMonth($user,date('Y'),date('m'));

		$timeline = Decode::getCalendar($timeline, $Notifications_timeline, date('Y'), date('m'));
		//create template
    	return $this->render('AcmeDashBundle:Default:panel.html.php', array('timeline' => $timeline));
    }
}