<?php

namespace Jalis\FoganBundle\Controller;


use Jalis\FoganBundle\Entity\User;
use Jalis\FoganBundle\Entity\Animal;
use Jalis\FoganBundle\Form\Type\UserType;
use Jalis\FoganBundle\Form\Type\AnimalType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="home")
     * @Template()
     */
    public function indexAction(Request $request)
    {
    }
  }
