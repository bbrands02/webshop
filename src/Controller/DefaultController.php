<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends AbstractController
{

    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->getAll();

        return ["products"=>$products];
    }

    /**
     * @Route("/contact-us")
     * @Template
     */
    public function contactAction()
    {
        return [];
    }

    /**
     * @Route("/about-us")
     * @Template
     */
    public function aboutAction()
    {
        return [];
    }
}