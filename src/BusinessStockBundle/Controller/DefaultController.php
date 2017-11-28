<?php

namespace BusinessStockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/stock")
     */
    public function indexAction()
    {
        return $this->render('BusinessStockBundle:Default:index.html.twig');
    }
}
