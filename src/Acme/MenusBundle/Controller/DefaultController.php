<?php

namespace Acme\MenusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\MenusBundle\Entity\Menu;

class DefaultController extends Controller
{
    
    public function getMenuAction($menu_type) {
    	$menu = $this->getDoctrine()
        ->getRepository('AcmeMenusBundle:Menu')
        ->findByType($menu_type);
    	return $this->render('AcmeMenusBundle:Default:menu.html.twig', array('menu' => $menu));
  	}
  	public function redirectAction($url)
   {
       return $this->redirect($this->generateUrl($url));
   }
}
