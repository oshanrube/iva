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
    	if(!$this->getRequest()->isXmlHttpRequest()){
			return $this->redirect($this->generateUrl('error'));
		}
		//get tasks
		$Task = $this->getDoctrine()->getRepository('AcmeTaskBundle:Task');
		//$em = $this->doctrine->getEntityManager();
		$timeline = $Task->findByThisMonth();
		$timeline = Decode::getCalendar($timeline);
		//var_dump($timeline);exit();
		//create template
		$templating = $this->get('templating');
    	$page = $templating->render('AcmeDashBundle:Default:panel.html.php', array('timeline' => $timeline));
    	$response = new Response(json_encode(array('page' => $page)));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
    }
}