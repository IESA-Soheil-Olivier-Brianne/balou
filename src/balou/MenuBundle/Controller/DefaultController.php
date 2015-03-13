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
    	// $menuRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouMenuBundle:blocMenu');
    	// $menuBloc = $menuRepository->find(1);
     //    var_dump($name);
        $menuRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouMenuBundle:blocmenu');
        $menuBlocs = $menuRepository->findAll();
        //var_dump($menuBlocs[0]->getMenu()->toArray());
        //var_dump($page); die();
        return $this->render('balouMenuBundle:Default:index.html.twig', array('header'=>$menuBlocs));

        //$blocmenuName=$name->getBlocmenu()->getNom();
        //return $this->render('balouMenuBundle:Default:index.html.twig', array('header'=>$name));
    }
}
