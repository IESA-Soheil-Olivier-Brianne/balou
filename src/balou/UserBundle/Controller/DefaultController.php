<?php

namespace balou\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('balouUserBundle:Default:index.html.twig', array('name' => $name));
    }
    
    /**
     * @Route("/userslist")
     * @Template()
     */
    public function usersAction() {
        //access user manager services 

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('balouUserBundle:Users:users.html.twig', array('users' =>   $users));
    }
}
