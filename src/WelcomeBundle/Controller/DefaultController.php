<?php

namespace WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WelcomeBundle:Default:index.html.twig');
    }
}
