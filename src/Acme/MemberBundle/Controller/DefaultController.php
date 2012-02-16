<?php

namespace Acme\MemberBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HomeBundle\Library\Mobile;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
		if(!Mobile::isMobile()) {
      	return $this->render('AcmeMemberBundle:Default:index.html.twig');
		} else {
			return $this->redirect($this->generateUrl('AcmeMobileBundle_homepage'));
		}
    }
}
