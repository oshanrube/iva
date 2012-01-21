<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class PanelController extends Controller
{
    
	public function indexAction($name = 'guest')
    {
        return $this->render('AcmeTaskBundle:Default:index.html.twig', array('name' => $name));
    }
	public function AddNewTaskAction()
	{
		// create a task and give it some dummy data for this example
		$task = new Task();
		$task->setTask('Write a blog post');
		//$task->setDueDate(new \DateTime('tomorrow'));

		$form = $this->createFormBuilder($task)
			->add('task')
			->getForm();
		return $this->render('AcmeTaskBundle:Panel:new.html.twig', array('form' => $form->createView(),));
	}
}
