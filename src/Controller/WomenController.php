<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WomenController extends AbstractController
{

    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        return [];
    }
}