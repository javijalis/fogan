<?php

namespace Jalis\FoganBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jalis\FoganBundle\Entity\TimelineAction;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
   $usr= $this->get('security.context')->getToken()->getUser();


        return array('name' => 'inicio');
    }
}
