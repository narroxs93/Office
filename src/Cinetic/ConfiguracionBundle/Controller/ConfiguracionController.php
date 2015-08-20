<?php

namespace Cinetic\ConfiguracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConfiguracionController extends Controller
{
    /**
     * @Route("/configuracion", name="configuracion")
     *
     */
    public function indexAction()
    {
        return $this->render('configuracion/configuracion.html.twig');
    }
}