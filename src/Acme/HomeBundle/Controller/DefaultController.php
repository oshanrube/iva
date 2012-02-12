<?php

namespace Acme\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HomeBundle\Entity\Article;
use Acme\HomeBundle\Library\Mobile;

class DefaultController extends Controller
{
    
	public function indexAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		if($user == 'anon.'){
			return $this->render('AcmeHomeBundle:Default:index.html.twig');
		} else {
			return $this->redirect($this->generateUrl('AcmeMemberBundle_dashboard'));	
		}
	}
	public function ajaxAction($article) {
		$request = $this->getRequest();

		if($request->isXmlHttpRequest()){
			$article = $this->getDoctrine()
			->getRepository('AcmeHomeBundle:Article')
			->findOneByTitle($article);
			return $this->render('AcmeHomeBundle:Default:article.html.twig', array('article' => $article));
		} else {
			$this->get('session')->setFlash('notice', 'Dude!!!!');
			return $this->redirect($this->generateUrl('AcmeHomeBundle_homepage'));
		}
	}
}
