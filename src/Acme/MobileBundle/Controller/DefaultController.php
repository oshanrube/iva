<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
       $user = $this->get('security.context')->getToken()->getUser();
		if($user == 'anon.'){
			return $this->render('AcmeMobileBundle:Default:login.html.twig');
		} else {
			return $this->render('AcmeMobileBundle:Default:index.html.twig');	
		}
		
    }
}
