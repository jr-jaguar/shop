<?php

namespace JRs\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Users Controller
 */
class UsersController extends Controller{
    /**
     * Show user
     */
    public function showUserAction($id){
        $em=$this->getDoctrine()->getManager();
        $user = $em->getRepository('JRsShopBundle:Users')->find($id);
        if (!$user) {
            throw $this->createNotFoundException('Нет такого пользователя');
        }
        return $this->render('JRsShopBundle:Users:showUser.html.twig', array(
            'user'=>$user,
        ));
    }

    public function usersListAction(){
        $em=$this->getDoctrine()->getManager();
        $users = $em->getRepository('JRsShopBundle:Users')->getUsersList();

        return $this->render('JRsShopBundle:Users:showUsers.html.twig', array(
            'users'=>$users
        ));
    }
}