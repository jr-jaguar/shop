<?php

namespace JRs\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller{

//    Home page
    public function homepageAction()
    {
        return $this->render('JRsShopBundle:Page:homepage.html.twig');
    }

//    About us
    public function aboutAction()
    {
        return $this->render('JRsShopBundle:Page:about.html.twig');
    }

//    Contacts
    public function contactsAction()
    {
        return $this->render('JRsShopBundle:Page:contacts.html.twig');
    }
} 