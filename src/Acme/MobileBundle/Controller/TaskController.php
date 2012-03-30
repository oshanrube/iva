<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Library\Decode;
use Acme\TaskBundle\Library\Language;
use Acme\TaskBundle\Library\Location;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Model\TaskModel;

class TaskController extends Controller
{
	public function AddAction(Request $request)
	{
		//array
		$suggestions = array();
		// create a task and give it some dummy data for this example
		$task = new Task();
		//jst for demo
//		$task->setTask('hey i have school Meeting tommorow in bmich');
		//create form
		$form = $this->createFormBuilder($task)
					->add('task')
					->getForm();
		if ($request->getMethod() == 'POST' && $this->getRequest()->isXmlHttpRequest()) 
		{	
			//flag variable initialize
			$user = $this->get('security.context')->getToken()->getUser();
			$em = $this->getDoctrine()->getEntityManager();
			$taskmodel = New TaskModel($em);
			if($taskmodel->AddNewTask($request,$user)){
				//if task was added
				//set flash 
				$this->get('session')->setFlash('success', $taskmodel->getDescription().', Got It!!');
				//send response
				return $this->redirect($this->generateUrl('AcmeMobileBundle_homepage'));
			}
			else {
				//re-load task
				$task->setTask($request->request->get('task'));
				//generate the panel
				$templating = $this->get('templating');
				//set flash 
				$this->get('session')->setFlash('question', $taskmodel->getQuestion());
				//generate the panel
				return $this->render('AcmeMobileBundle:Task:add.html.twig', 
							array(
								'form' => $form->createView(),
								'task' => $task,'didyoumean' => $taskmodel->getDidyoumean(),
								'suggestions' => $taskmodel->getSuggestions(),
								'venues' => $taskmodel->getVenues()
								)
							);
			}
		}
		return $this->render('AcmeMobileBundle:Task:add.html.twig', 
		array('form' => $form->createView(),'task' => $task,'didyoumean' => ''));			
	}
	
	public function viewTodaysAction(Request $request)
	{
		$Task = $this->getDoctrine()->getRepository('AcmeTaskBundle:Task');
		$user = $this->get('security.context')->getToken()->getUser();
		$tasklist = $Task->findByToday($user);
		return $this->render('AcmeMobileBundle:Task:today.html.twig', 
		array('tasklist' => $tasklist));
	}
	
	public function viewTaskAction(Request $request,$id)
	{
		$task = $this	->getDoctrine()->getRepository('AcmeTaskBundle:Task')
							->findOneById($id);
		$user = $this->get('security.context')->getToken()->getUser();
		if($task->getUserId() != $user->getId())
			throw $this->createNotFoundException('The task does not exist');
		
		return $this->render('AcmeMobileBundle:Task:task.html.twig', array('task' => $task));
	}
}










