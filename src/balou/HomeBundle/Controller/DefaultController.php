<?php

namespace balou\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {	
        return $this->render('balouHomeBundle::admin-dashboard.html.twig');
    }

    /**
     * @Route("/dashboard")
     * @Template()
     */
    public function whoIsOnlineAction()
    {
        $users = $this->getDoctrine()->getManager()->getRepository('balouUserBundle:User')->getActive();
 
        return $this->render('balouHomeBundle::admin-dashboard.html.twig',array('usersOnline' => $users));
    }
}
