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
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //Si el usuario no esta logueado con cargo entrenador comercial
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ENTRENADOR COMERCIAL')) 
        {
           
            //return $this->render('denegado.html.twig',array('aa'=>$aa));
            return new Response("sin permiso");
        }

        $ttrform = new Ttrform();
        //importar el formulario que esta en appbundle/form/ttrformtype
        $form = $this->createForm('AppBundle\Form\TtrformType', $ttrform);
        //si se envia el formulario se capturan los datos
        $form->handleRequest($request);


        //si el formulario es enviado y es valido
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            //seleccionar cedula del usuario logueado
            $cedula = $this->get('security.token_storage')->getToken()->getUser();
            //traer el objeto usuario que crea el formulario
            $smbdEtlExtract = $em->getRepository('AppBundle:SmbdEtlExtract')->find($cedula);
            //insertar el objeto smbdEtlExtract en ttrform
            $ttrform->setSmbdEtlExtract($smbdEtlExtract);
            //con estas dos lineas se guarda el formulario en la bd
            $em->persist($ttrform);
            $em->flush($ttrform);


            //si ya esta aqui es porque los datos se insertaron correctamente
            $this->addFlash(
            'mensaje',
            'Usuario creado correctamente'
            );

            return $this->redirectToRoute('index_form');


        }



        //redenderizar y luego crear la vista formulario
        return $this->render('ttrform/new.html.twig',array(
            'form' => $form->createView(),)
        );
    }



}



