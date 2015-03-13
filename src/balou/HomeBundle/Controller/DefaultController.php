<?php

namespace balou\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use balou\UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {	
        $usersRepository = $this->getDoctrine()->getManager()->getRepository('balouUserBundle:User');
        $users=$usersRepository->getActive();

 
        return $this->render('balouHomeBundle::admin-dashboard.html.twig',array('usersOnline' => $users));
    }

}
