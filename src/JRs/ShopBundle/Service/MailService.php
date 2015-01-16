<?php

namespace JRs\ShopBundle\Service;

use JRs\ShopBundle\Entity\Contact;
use JRs\ShopBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MailService {
    protected $mailer;
    public function setMailer(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function sendEmail()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact from mz.lo')
            ->setFrom('contact@mz.lo')
            ->setTo('test_mail@ukr.net')
            ->setBody('Message body');

        $this->mailer->send($message);
    }
} 
