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
use AppBundle\Entity\Ttrfieldsf;
use AppBundle\Entity\Valuesf;
use AppBundle\Form\TtrformType;

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
        $ttrfieldsf = new Ttrfieldsf();
        $valuesf = new Valuesf();
        //cosa rara de symfony, es para crear el otro formulario incrustado fieldstype
        $ttrform->getTtrfieldsf()->add($ttrfieldsf);
        //cosa rara de symfony, es para crear el otro formulario incrustado valuesf dentro fieldstype 
        $ttrfieldsf->getValuesfs()->add($valuesf);


        //importar el formulario que esta en appbundle/form/ttrformtype
        $form = $this->createForm(TtrformType::class, $ttrform);
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
            //Insertar el objeto ttrform en ttrfield para que guarde el id
            $ttrfieldsf->setTtrform($ttrform);
            //Insertar el objeto ttrfieldsf en valuesf para que guarde el id
            $valuesf->setTtrfieldsf($ttrfieldsf);
            //con estas dos lineas se guarda el formulario en la bd
            $em->persist($ttrform);
            $em->persist($ttrfieldsf);
            $em->persist($valuesf);
            $em->flush();



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



