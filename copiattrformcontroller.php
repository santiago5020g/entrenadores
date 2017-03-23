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
     * @Route("/nuevo_formulario", name="new_form_post")
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
        $name = $request->request->get("nombre");
        $active = $request->request->get("activo");
        //instanciar el objeto form
        $ttrform = new Ttrform();
        //meter los valores en cada columna de ttrform
        $ttrform->setName($name);
        $ttrform->setActive($active);
        //incluir el validador
        $validator = $this->get('validator');
        //validar el formulario de acuerdo al modelo
        $errors = $validator->validate($ttrform);

        //variable que guardara errores en html recibidos del array errors
        $html_errors = "";
        //si hay errores 
        if (count($errors) > 0) {
            //sacar error por error
            for ($i=0; $i <count($errors); $i++) { 
                //pasar los errores a html
                
            }
            //mensaje flash que se mostrara en newhtmtwig
            $this->addFlash("errors", $errors->message);
            return $this->render('ttrform/new.html.twig');
        }

        return new Response("guarda");
    
    }


}



