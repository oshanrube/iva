<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Library\Decode;
use Symfony\Component\HttpFoundation\Request;

class PanelController extends Controller
{

	public function indexAction($name = 'guest')
	{
		return $this->render('AcmeTaskBundle:Default:index.html.twig', array('name' => $name));
	}
	public function AddNewTaskAction(Request $request)
	{
		// create a task and give it some dummy data for this example
		$task = new Task();
		if ($request->getMethod() == 'POST' && $this->getRequest()->isXmlHttpRequest()) 
		{
			//get time
			$datetime = Decode::getDateTime($request->request->get('task'));
			echo $datetime;exit(); 
			$form->bindRequest($request);
				if ($form->isValid()) {
					$em = $this->getDoctrine()->getEntityManager();
					$em->persist($task);
					$em->flush();
					// perform some action, such as saving the task to the database

					return $this->redirect($this->generateUrl('AcmeTaskBundle_success'));
				}
		}
			
		$form = $this->createFormBuilder($task)
					->add('task')
					->getForm();
		return $this->render('AcmeTaskBundle:Panel:new.html.twig', array('form' => $form->createView(),));
	}
}