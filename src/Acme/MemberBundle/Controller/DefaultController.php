<?php

namespace Acme\MemberBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AcmeMemberBundle:Default:index.html.twig');
    }
}
