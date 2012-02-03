<?php

namespace Acme\LocationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AcmeLocationBundle:Default:index.html.twig');
    }
    public function location($label,$lng,$lat) {
    	$icon = 'http://chart.apis.google.com/chart?chst=d_bubble_text_small&chld=bb|'.$label.'|3e9bc4|ffffff';
    	$url = 'http://maps.googleapis.com/maps/api/staticmap?size=500x500&markers=color:blue%7Cicon:'.$icon.'%7C'.$lat.','.$lat.'&sensor=false';
    }
}
