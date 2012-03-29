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

class GoogleController extends Controller
{	 
	public function loginAction(Request $request)
	{
		//retrive access token and profile details
		$googleapi = new Googleapi();
		$code = $request->query->get('code');
		//if not logged in 
		if(empty($code)) {
			$url = $googleapi->register();
			return new RedirectResponse($url);
		}
		$accesstokenRes = $googleapi->getAccessToken($code);
		$profile = $googleapi->getProfile($accesstokenRes->access_token);		
		//cross reference the database with user id
		$userManager = $this->get('fos_user.user_manager'); 
		if(!($user = $userManager->findUserByUsername($profile->id)) && !($user = $userManager->findUserByEmail($profile->email))){
			//if not found create a new login
			$user = $userManager->createUser();
			$user->setUsername($profile->id);
			$user->setEmail($profile->email);
			$user->setPassword($code);
			$user->setName($profile->name);
			$user->setAvgspeed(60);
			$user->setEnabled(1);
			$user->setLoginType('google');
			$userManager->updateUser($user);
		}
		//login the user
		$providerKey = $this->container->getParameter('fos_user.firewall_name'); 
      $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles()); 
      $this->container->get('security.context')->setToken($token); 
      $this->container->get('session')->set('_security_' . $providerKey, serialize($token));
		
		return $this->redirect($this->generateUrl('AcmeMemberBundle_dashboard'));
	}
	
}
