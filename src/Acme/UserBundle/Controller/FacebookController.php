<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use FOS\UserBundle\Model\UserInterface;

use Acme\UserBundle\Library\Googleapi;
use Acme\CalendarBundle\Library\Includes\Facebook;

class FacebookController extends Controller
{	 
	public function loginAction(Request $request)
	{
		$code = $request->query->get('code');
		$facebook = new Facebook();
		//if not logged in 
		if(empty($code)) {
			return new RedirectResponse($facebook->getUrl());
		}
		//exchange the exchange code to access token
		$accesstokenRes = $facebook->getAccessToken($code);
		if(!$accesstokenRes) {
			 $this->get('session')->setFlash('error', 'Error accesing your facebook account please try again later!');
			return new RedirectResponse($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
		}
		//update the user token
		$user = $this->get('security.context')->getToken()->getUser();
		$user->setFbToken($accesstokenRes->access_token);
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($user);
		$em->flush();
		return $this->redirect($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
	}
	
}
