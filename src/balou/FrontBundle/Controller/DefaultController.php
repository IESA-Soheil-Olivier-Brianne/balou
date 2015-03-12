<?php

namespace balou\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\MediaBundle\Entity\media;
use balou\MenuBundle\Entity\blocmenu;
use balou\MenuBundle\Entity\menu;
use balou\PageBundle\Entity\page;
use balou\TemplateBundle\Entity\template as templateentity;

class DefaultController extends Controller
{
    /**
     * @Route("/front")
     * @Template()
     */
    public function indexAction()
    {
    	$menuRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouMenuBundle:blocmenu');
        $menuBloc = $menuRepository->find(1);
        var_dump($menuBloc->getMenu()->toArray());

        //$blocmenuName=$name->getBlocmenu()->getNom();
        return $this->render('balouFrontBundle:Default:index.html.twig', array('header'=>$menuBloc->getNom()));
    }

    /**
     * @Route("/page/{url}")
     * @Template()
     */
    public function pageAction(page $page)
    {
var_dump($page); die();
    }
}
