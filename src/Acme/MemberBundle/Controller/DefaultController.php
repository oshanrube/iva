<?php

namespace Acme\MemberBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HomeBundle\Library\Mobile;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
    	if(Mobile::isMobile())return $this->redirect($this->generateUrl('AcmeMobileBundle_homepage'));
    	
		return $this->render('AcmeMemberBundle:Default:index.html.twig');
    }
    public function profileNotificationAction() {
    	$user = $this->get('security.context')->getToken()->getUser();
    	$height = 121;
    	$errors = 0;
    	if(strlen($user->getDeviceId()) < 10 ){
    		$height += 36; $errors++;
    	}
    	if(strlen($user->getPhoneNum()) < 10 ){
    		$height += 18; $errors++;
    	}
    	if(strlen($user->getBackupPhoneNum()) < 10 ){
    		$height += 36; $errors++;
    	}
    	
    	
    	return $this->render('AcmeMemberBundle:Default:profileAlert.html.twig',array('user' => $user, 'height' => $height, 'errors' => $errors));
    }
}
