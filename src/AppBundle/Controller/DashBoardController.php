<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


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


    	//si los roles no son estos el usuario no tiene permiso a acceder al dashboard
    	if(!$this->get('security.authorization_checker')->isGranted('ANALISTA DE TESORERIA Y FINANZAS') || 
    	!$this->get('security.authorization_checker')->isGranted('ACCOUNT MANAGER') || 
    	!$this->get('security.authorization_checker')->isGranted('ACCOUNT MANAGER SENIOR') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMIN CENTRO ACOPIO STAN A') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMIN CENTRO ACOPIO STAN B') ||
    	!$this->get('security.authorization_checker')->isGranted('ADMIN CENTRO ACOPIO STAN C') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR BD') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR BD SQL Y PLATAFORMA DE BACKUP') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR CDE') ||
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR CDE CENTRO') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR CDE COSTA') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR CENTRO DE SERVICIO ESTANDAR B') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE APLICACIONES') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE INVENTARIO DE HARDWARE/SOFTWARE II') ||
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE MESA DE SERVICIO') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE SERVIDORES DE APLICACION') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE SISTEMAS OPERATIVOS LINUX') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE SISTEMAS OPERATIVOS WINDOWS') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR DE VOZ') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR MESA DE SERVICIO') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR PLATAFORMA SYMANTEC') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR SERVIDORES OUTSOURCING') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR TRAFICO') || 
    	!$this->get('security.authorization_checker')->isGranted('ADMINISTRADOR WEB')
    	)

    	{
            return $this->render('denegado.html.twig');
        }

        
       	return $this->render('dashboard/index.html.twig');
    }
}



