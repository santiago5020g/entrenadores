<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * Ttrform controller.
 * @Route("formularios")
 */
class TtrformControllerController extends Controller
{
    /**
     * @Route("/", name="index_form")
     */
    public function indexAction(Request $request)
    {
            //Si el usuario no esta logueado con cargo entrenador comercial
            if (!$this->get('security.authorization_checker')->isGranted('ENTRENADOR COMERCIAL')) 
            {
                return $this->render('denegado.html.twig');
            }

        //cargar el reporsitorio formularios
        $repository = $this->getDoctrine()->getRepository('AppBundle:Ttrform');
        // traer todos los formularios creados
        $forms = $repository->findAll();

        return $this->render('ttrform/index.html.twig'array('forms'=>$forms));
    }
}



