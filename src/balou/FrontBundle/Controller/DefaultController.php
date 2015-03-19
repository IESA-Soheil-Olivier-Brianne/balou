<?php

namespace balou\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\MediaBundle\Entity\media;
use balou\MenuBundle\Entity\blocmenu;
use balou\MenuBundle\Entity\menu;
use balou\PageBundle\Entity\page;
use balou\PageBundle\Entity\Articles;
use balou\TemplateBundle\Entity\template as templateentity;

class DefaultController extends Controller
{
    /**
     * @Route("/page/{url}")
     * @Template()
     */
    public function pageAction(page $page)
    {
        $menuRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouMenuBundle:blocmenu');
        $menuBlocHeader = $menuRepository->findOneBy(array('nom' => 'Header'));
        $menuBlocFooter = $menuRepository->findOneBy(array('nom' => 'Footer'));

        $cssRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouTemplateBundle:Template');
        $cssBloc = $cssRepository->find(1);

        $htmlRepository = $this->get('doctrine.orm.entity_manager')->getRepository('balouTemplateBundle:BlocHtml');
        $htmlBlocRight = $htmlRepository->findOneBy(array('nom' => 'Right'));
        $htmlBlocLeft = $htmlRepository->findOneBy(array('nom' => 'Left'));
        //var_dump($menuBloc->getMenu()->toArray());
        //var_dump($page); die();
<<<<<<< HEAD
        return $this->render('balouFrontBundle:Default:index.html.twig', array('header'=>$menuBlocHeader, 'page'=>$page, 'css'=>$cssBloc, 'htmlR'=>$htmlBlocRight,'htmlL'=>$htmlBlocLeft, 'footer' => $menuBlocFooter));
=======

        return $this->render('balouFrontBundle:Default:index.html.twig', array('header'=>$menuBlocHeader, 'page'=>$page, 'css'=>$cssBloc, 'htmlR'=>$htmlBlocRight,'htmlL'=>$htmlBlocLeft));
>>>>>>> 8914b10d65c62ae0c140894124df29dc6fa80568
    }
}
