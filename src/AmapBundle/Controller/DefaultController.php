<?php

namespace AmapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmapBundle:Default:index.html.twig');
    }
     public function devAction()
    {
        return $this->render('AmapBundle:Default:enDev.html.twig');
    }
}
