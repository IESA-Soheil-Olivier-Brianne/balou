<?php

namespace balou\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

	public function uploadAction()
{

    $form = $this->createFormBuilder($document)
        ->add('name')
        ->add('file')
        ->getForm();

    $document->upload();

}
}
