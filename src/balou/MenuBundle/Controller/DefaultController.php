<?php

namespace balou\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/menuparbloc")
     * @Template()
     */
    public function indexAction()
    {
    	$menuRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouMenuBundle:menu');
    	$name = $menuRepository->findBy(array('blocmenu'=> 1));
        var_dump($name);

        //$blocmenuName=$name->getBlocmenu()->getNom();
        return $this->render('balouMenuBundle:Default:index.html.twig', array('header'=>$name));
    }
}
