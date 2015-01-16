<?php

namespace JRs\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JRs\ShopBundle\Entity\Users;
use JRs\ShopBundle\Form\UsersType;
class RegistrationController extends Controller {

    public function formAction(){
        $user = new Users();
        $form = $this->createForm(new UsersType(), $user);
        $request=$this->getRequest();
        if ($request->getMethod()=='POST') {
            $form->bind($request);

            if ($form->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->get('session')->getFlashBag()->add('registration-massage','You are registered');
                return $this->redirect($this->generateUrl('j_rs_shop_registration'));

            }
        }
        return $this->render('JRsShopBundle:Page:registration.html.twig', array(
            'form' => $form->createView()
        ));
    }

} 