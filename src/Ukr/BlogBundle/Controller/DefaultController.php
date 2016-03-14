<?php

namespace Ukr\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UkrBlogBundle:Default:index.html.twig');
    }

}
