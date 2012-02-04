<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
	public function indexAction($name = 'guest')
    {
        return $this->render('AcmeTaskBundle:Default:index.html.twig', array('name' => $name));
    }
	public function newAction(Request $request)
	{
		// create a task and give it some dummy data for this example
		$task = new Task();

		$form = $this->createFormBuilder($task)
			->add('task')
			->add('datetime')
			->getForm();
		//if save
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($task);
				$em->flush();
				// perform some action, such as saving the task to the database

				return $this->redirect($this->generateUrl('AcmeTaskBundle_success'));
			}
		}
		return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
			'form' => $form->createView(),
			));
	}
}
