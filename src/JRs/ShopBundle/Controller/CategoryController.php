<?php

namespace JRs\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class CategoryController extends Controller {

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('JRsShopBundle:Category')->findAll();

        return $this->render('JRsShopBundle:Page:navigation.html.twig', array(
            'category' => $category,
        ));
    }
    public function showAction($slug){
        $em=$this->getDoctrine()->getManager();
        $category=$em->getRepository('JRsShopBundle:Category')->findOneBy($slug);

        if(!$category){
            throw $this->createNotFoundException('Unable to find Category');
        }

        return $this->render();
    }

} 
