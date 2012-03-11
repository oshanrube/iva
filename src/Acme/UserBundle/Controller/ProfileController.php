<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;


class ProfileController extends Controller
{
    
	public function profileAction()
	{
		$user = $this->get('security.context')->getToken()->getUser();
		return $this->render('AcmeUserBundle:Profile:profile.html.twig', array('user' => $user));
	}
	public function editAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
		if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
		$form = $this->container->get('fos_user.profile.form');
		$formHandler = $this->container->get('fos_user.profile.form.handler');
	
		$process = $formHandler->process($user);
		if ($process) {
				$this->get('session')->setFlash('fos_user_success', 'profile.flash.updated');
	
				return new RedirectResponse($this->container->get('router')->generate('AcmeUserBundle_profile'));
		}
		return $this->render('AcmeUserBundle:Profile:edit-profile.html.twig', 
			array('form' => $form->createView(), 'theme' => $this->container->getParameter('fos_user.template.theme'), 'user' => $user)
		);
	}

}
