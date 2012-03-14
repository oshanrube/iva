<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeUserBundle:Default:index.html.twig', array('name' => $name));
    }
    public function loginFailureAction(Request $request)
    {
    	var_dump($request->request);exit();
    	return $this->redirect($this->generateUrl('AcmeCalendarBundle_dash_list_calendars'));
        return $this->render('AcmeUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
