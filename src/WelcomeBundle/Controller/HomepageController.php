<?php

namespace WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WelcomeBundle\Form\Type\ContactType;


class HomepageController extends Controller
{
    
    public function indexAction()
    {
        $userName = $this->get('session')->get('user_name');
        $this->addFlash('notice', 'Bienvenue à toi '.$userName.' !');
        return $this->render('WelcomeBundle:Homepage:index.html.twig',
                ["user_name" =>$userName,
                 "form" => $this->get('form.factory')->create(new ContactType())->createView()]);
    }
    public function whoAmIAction($name)
    {
        # get the session
        $session = $this->get('session'); # Le raccourci $this->getSession() est disponible.
        
        # store the user'name in the session
        $session->set('user_name', $name);
        return $this->redirect($this->generateUrl('WelcomeBundle_homepage'));
    }
    public function subscribeAction() {
        $form = $this->createFormBuilder()
                    ->add('titre', 'text')
                    ->add('last_name', 'text')
                    ->add('email', 'email')
                    ->add('last_name', 'text')
                    ->getForm();
        
        return $this->render('WelcomeBundle:Homepage:subscribe.html.twig', ["form" =>$form->createView()]);
    }
}
