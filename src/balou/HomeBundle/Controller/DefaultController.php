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

        $pagesRepository = $this->getDoctrine()->getManager()->getRepository('balouPageBundle:page');
        $pages=$pagesRepository->findAll();

        $notesRepository = $this->getDoctrine()->getManager()->getRepository('balouHomeBundle:Notes');
        $notes=$notesRepository->findNote();
        //var_dump($notes);

        $notesCountRepository = $this->getDoctrine()->getManager()->getRepository('balouHomeBundle:Notes');
        $notesCount=$notesCountRepository->findNote();
 
        return $this->render('balouHomeBundle::admin-dashboard.html.twig',array('usersOnline' => $users, 'pages' =>$pages,'notes' => $notes, 'notescount' => $notesCount));
    }

}
