<?php
# src/WelcomeBundle/Form/Model/Contact.php

namespace WelcomeBundle\Form\Model;

class Contact
{
    /**
     * Email
     * @var string
     */
    protected $email;
    
    /**
     * Subject
     * @var string
     */
    protected $subject;
    
    /**
     * Content
     * @var string
     */
    protected $content;
    
    /**
     * FirstName
     * @var string
     */
    protected $firstName;
    
    /**
     * LastName
     * @var string
     */
    protected $lastName;
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    
    public function getSubject() {
        return $this->subject;
    }
    
    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
    /**
     * @return the $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return the $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
}

