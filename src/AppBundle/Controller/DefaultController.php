<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $this->get('session')->set('filters',array());
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function aboutUsAction(){
        return $this->render('application/about_us.html.twig');
    }

    public function helpAndSupportAction(){
        return $this->render('application/help_and_support.html.twig');
    }
}
