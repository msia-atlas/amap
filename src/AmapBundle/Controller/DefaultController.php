<?php

namespace AmapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AmapBundle:Default:index.html.twig', array('name' => $name));
    }
}
