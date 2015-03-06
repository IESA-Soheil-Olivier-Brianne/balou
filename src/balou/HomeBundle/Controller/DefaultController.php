<?php

namespace balou\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {	
        return $this->render('balouHomeBundle::admin-dashboard.html.twig');
    }
}
