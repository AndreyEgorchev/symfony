<?php

namespace ProdAuto\ProdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProdAutoProdBundle:Default:index.html.twig');
    }
}
