<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HomeBundle\Library\Mobile;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
    	if(!Mobile::isMobile())return $this->render('AcmeMemberBundle:Default:index.html.twig');
    	
		$user = $this->get('security.context')->getToken()->getUser();
		if($user == 'anon.'){
			return $this->redirect($this->generateUrl('fos_user_security_login'));
		} else {
			return $this->render('AcmeMobileBundle:Default:index.html.twig');	
		}
		
    }
}
