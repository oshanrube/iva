<?php

namespace Acme\TaskBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
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
		//create form
		$form = $this->createFormBuilder($task)
					->add('task')
					->getForm();
		if ($request->getMethod() == 'POST' && $this->getRequest()->isXmlHttpRequest()) 
		{
			//get time
			$datetime = Decode::getDateTime($request->request->get('task'));
			//if the time is a error
			if($datetime == 0){
				$this->get('session')->setFlash('question', 'Hey system couldnt figure out the "when" part, please help out!!');
				//generate the panel 
				$templating = $this->get('templating');
				$panel = $templating->render('AcmeTaskBundle:Panel:new.html.twig', array('form' => $form->createView(),));
				//send response
				$response = new Response(json_encode(array( 'response' => 'reload','html' => $panel )));
				$response->headers->set('Content-Type', 'application/json');
				return $response;	
			}
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
		return $this->render('AcmeTaskBundle:Panel:new.html.twig', array('form' => $form->createView(),));
	}
}