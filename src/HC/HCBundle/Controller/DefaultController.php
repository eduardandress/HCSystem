<?php

namespace HC\HCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HCHCBundle::ejemplopagina.html.twig');
    }
}
