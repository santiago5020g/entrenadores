<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Ttrform;

/**
 * Ttrform controller.
 * @Route("formularios")
 */
class TtrformController extends Controller
{
    /**
     * @Route("/", name="index_form")
     */
    public function indexAction(Request $request)
    {
            //Si el usuario no esta logueado con cargo entrenador comercial
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ENTRENADOR COMERCIAL')) 
            {
               
                //return $this->render('denegado.html.twig',array('aa'=>$aa));
                return new Response("sin permiso");
            }


        //cargar el reporsitorio formularios
        $repository = $this->getDoctrine()->getRepository('AppBundle:Ttrform');
        // traer todos los formularios creados
        $forms = $repository->findAll();

        return $this->render('ttrform/index.html.twig',array('forms'=>$forms));
    }


    /**
     * @Route("/nuevo_formulario", name="new_form")
     * @Method({"GET"})
     */
    public function newAction()
    {
        //Si el usuario no esta logueado con cargo entrenador comercial
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ENTRENADOR COMERCIAL')) 
        {
           
            //return $this->render('denegado.html.twig',array('aa'=>$aa));
            return new Response("sin permiso");
        }

        //esta variable se usa en el post al enviar el formulario. en new2Action. 
        return $this->render('ttrform/new.html.twig');
    }



    /**
     * @Route(false, name="new_form_post")
     * @Method({"POST"})
     */
    public function new2Action(Request $request)
    {
        //Si el usuario no esta logueado con cargo entrenador comercial
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ENTRENADOR COMERCIAL')) 
        {
           
            //return $this->render('denegado.html.twig',array('aa'=>$aa));
            return new Response("sin permiso");
        }

         // $_POST parameters
        //se capturan los campos del formulario
        $ttrform = new Ttrform();
        //obtener los parametros POST
        $ttrform->setName($request->request->get("nombre"));
        $ttrform->setActive($request->request->get("activo"));
        //incluir el validador
        $validator = $this->get('validator');
        //validar el formulario
        $errors = $validator->validate($ttrform);

        if (count($errors) > 0) {
            return $this->render('ttrform/new.html.twig');
        }

        return new Response("guarda");
    
    }


}



