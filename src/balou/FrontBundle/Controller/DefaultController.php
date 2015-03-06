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
    	$page= new page();
        return $this->render('balouFrontBundle:Default:index.html.twig',array('titre' => $page->getTitle()));
    }
}
