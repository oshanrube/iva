<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
	public function deleteAction(Request $request)
	{
		$id = $request->request->get("id");
		//get the task list from db
		$user = $this->get('security.context')->getToken()->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$task = $em->getRepository('AcmeTaskBundle:Task')
            		->findOneByUserAndId($id,$user);
      //get noti
      $notification = $em->getRepository('AcmeTaskBundle:Notification')
            			->findOneByTaskId($task->getId());
      $em->remove($notification);
		$em->remove($task);
		$em->flush();
		$this->get('session')->setFlash('success', 'Task has been successfully deleted');
		return $this->redirect($this->generateUrl('AcmeDashBundle_ajax_panel'));
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
