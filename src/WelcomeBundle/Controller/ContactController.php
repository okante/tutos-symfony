<?php
namespace WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WelcomeBundle\Form\Type\ContactType;
use WelcomeBundle\Form\Handler\ContactHandler;

class ContactController extends Controller
{
    /**
     * Contact
     *
     * @author Vincent Paulin
     */
    public function indexAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());
        
        // Get the request
        $request = $this->get('request');
        
        // Get the handler
        $formHandler = new ContactHandler($form, $request, $this->get('mailer'));
        
        $process = $formHandler->process();
        
        if ($process)
        {
            // Launch the message flash
            $this->addFlash('notice', 'Merci de nous avoir contacté, nous répondrons à vos questions dans les plus brefs délais.');
        }
        
        return $this->render('WelcomeBundle:Contact:index.html.twig', [
                'form' => $form->createView(),
                'hasError' => $request->getMethod() == 'POST' && !$form->isValid()
                
            ]);
        
    }
}
