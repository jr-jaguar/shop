<?php

namespace JRs\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JRs\ShopBundle\Entity\Product;
use JRs\ShopBundle\Form\ProductType;

/**
 * Product User controller.
 *
 */
class ProductUserController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JRsShopBundle:Product')->findAll();

        return $this->render('JRsShopBundle:ProductUser:index.html.twig', array(
            'entities' => $entities,
        ));
    }


    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JRsShopBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }



        return $this->render('JRsShopBundle:ProductUser:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
