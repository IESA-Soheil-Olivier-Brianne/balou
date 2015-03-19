<?php

namespace balou\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/testing/notifications")
     * @Template()
     */
    public function indexAction()
    {
        $notify = $this->get("balou.notify");
        $notify->add("test", array("type" => "instant", "message" => "This is awesome"));
        if ($notify->has("test")) {
            return array("notifications" => $notify->get("test"));
        }
 
        return array();
    }
}
