<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;



/**
 * DashBoard controller.
 * @Route("dashboard")
 */
class DashBoardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction(Request $request)
    {
            //Si el usuario no esta logueado
            if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) 
            {
                return $this->render('denegado.html.twig');
            }

        return $this->render('dashboard/index.html.twig');
    }
}



