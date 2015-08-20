<?php

namespace Cinetic\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     *
     */
    public function indexAction()
    {
        return $this->render('dashboard/dashboard.html.twig');
    }
}