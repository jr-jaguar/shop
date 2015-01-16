<?php

namespace JRs\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JRs\ShopBundle\Entity\Contact;
use JRs\ShopBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class PageController extends Controller
{

//    Home page
    public function homepageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository('JRsShopBundle:Category')->getCategoryList();
        return $this->render('JRsShopBundle:Page:homepage.html.twig', array(
            'category' => $cat
        ));

    }

    public function navigationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository('JRsShopBundle:Category')->getCategoryList();
        return $this->render('JRsShopBundle:Page:navigation.html.twig', array(
            'category' => $cat
        ));

    }

//    About us
    public function aboutAction()
    {
        return $this->render('JRsShopBundle:Page:about.html.twig');
    }

//    Contacts


    public function contactsAction()
    {
        // creating the contact entity and the form
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);


        // if request is post, validate form and send mail
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                if ($this->sendEmail($contact)) {
                    $this->get('session')->getFlashBag()->add('notice', 'Ваш запрос успешно отправлен. Спасибо!');
                    return $this->redirect($this->generateUrl('j_rs_shop_contacts'));
                } else {
                    $this->get('session')->getFlashBag()->add('notice', 'К сожалению письмо не отправлено!');
                }
                return $this->redirect($this->generateUrl('j_rs_shop_contacts'));


            }
        }

        return $this->render('JRsShopBundle:Page:contacts.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Contact $contact
     * @return type 1 (true) if send successfully, 0 (false) otherwise
     */
    public function sendEmail($contact)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact from mz.lo')
            ->setFrom('contact@mz.lo')
            ->setTo($this->container->getParameter('jrs_shop.emails.contact_email'))
            ->setBody($this->renderView('JRsShopBundle:Page:email.txt.twig', array('contact' => $contact)))
        ;
        return $this->get('mailer')->send($message);

    }




    /**
     * @Template("JRsShopBundle:Page:sendmail.html.twig")
     * @return array
     */
    public function sendEmailTAction()
    {
        $sendmail = $this->get('test_mailer');
        $sendmail->sendEmail();

        return array('key' => 'test');
    }
}


