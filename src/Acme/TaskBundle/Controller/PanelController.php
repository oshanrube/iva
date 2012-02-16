<?php

namespace Acme\TaskBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Library\Decode;
use Acme\TaskBundle\Library\Language;
use Acme\TaskBundle\Library\Location;
use Acme\TaskBundle\Entity\Calendar;
use Acme\TaskBundle\Model\TaskModel;


class PanelController extends Controller
{

	public function indexAction($name = 'guest')
	{
		return $this->render('AcmeTaskBundle:Default:index.html.twig', array('name' => $name));
	}
	public function AddNewTaskAction(Request $request)
	{
		//array
		$suggestions = array();
		// create a task and give it some dummy data for this example
		$task = new Task();
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
				//send response
				$response = new Response(json_encode(array( 'response' => 'success','message' => $taskmodel->getDescription().', Got It!!' )));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}
			else {
				//re-load task
				$task->setTask($request->request->get('task'));
				//generate the panel
				$templating = $this->get('templating');
				//set flash 
				$this->get('session')->setFlash('question', $taskmodel->getQuestion());
				//response
				$panel = $templating->render('AcmeTaskBundle:Panel:new.html.twig', 
							array(
								'form' => $form->createView(),
								'task' => $task,'didyoumean' => $taskmodel->getDidyoumean(),
								'suggestions' => $taskmodel->getSuggestions(),
								'venues' => $taskmodel->getVenues()
								)
							);
				//send response
				$response = new Response(json_encode(array( 'response' => 'reload','html' => $panel )));
				$response->headers->set('Content-Type', 'application/json');
				return $response;
			}
		}
		return $this->render('AcmeTaskBundle:Panel:new.html.twig', 
		array('form' => $form->createView(),'task' => $task,'didyoumean' => '')
		);
	}
}