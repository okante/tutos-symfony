<?php
namespace WelcomeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class ContactType extends AbstractType
{
    private $class;
    public function __contruct($class)
    {
        $this->class = $class;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email')
        ->add('last_name', 'text')
        ->add('first_name', 'text')
        ->add('subject', 'text')
        ->add('content', 'textarea');
    }
    
    public function getName()
    {
        return 'Contact';
    }
    
    public function getOldDefaultOptions(array $options)
    {
        $collectionConstraint = new Collection([
            'email' => new Email(['message' => 'Adresse email invalide']),
            'subject' => [new Length(['min' => 5,
                                            'minMessage' => 'Sujet trop court',
                                            'max' => 140,
                                            'maxMessage' => 'Sujet trop long'
                                           ]
                )],
                'content' => new Length(['min' => 40,
                                        'minMessage' => 'Contenu trop court'
                                        ]
                ),
            ]);
        
        return ['validation_constraint' => $collectionConstraint];
    }
    public function getDefaultOptions(array $options)
    {
        return ['data_class' => $this->class];
    }
    
}

