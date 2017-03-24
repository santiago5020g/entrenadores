<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Ttrform;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TtrformType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
        ->add('name', TextType::class, array('attr' => array('class' => 'form-control'),'label'=>'Nombre del formulario'))
        ->add('active', ChoiceType::class, array( 
            'attr' => array('class' => 'form-control'),
            'label'=>'El formulario esta',
            'choices'  => array(
                'Activo' => 1,
                'Inactivo' => 0,
            ),
        ))
        ->add('cargos', EntityType::class, array(
        'attr' => array('class' => 'form-control','style'=>'margin-bottom:35px'),
        'label'=>'Los cargos que podran ver este formulario',
        // query choices from this entity
        'class' => 'AppBundle:Cargo',

        'placeholder' => 'Los cargos que podran ver este formulario...',
        'multiple'=>true,
        // use the User.username property as the visible option string
        'choice_label' => 'name',
        ));


        /*
        $builder->add('ttrfieldsf', TtrfieldsfType::class, array(
            'label'=>'CAMPOS DEL FORMULARIO',
            'data_class' => null,
        ));
        */

        //agregar el formulario TtrfieldsfTupe
        $builder->add('ttrfieldsf', CollectionType::class, array(
            'label'=>'CAMPOS DEL FORMULARIO',
            'attr'=>array('style'=>'margin-top:20px'),
            'entry_type' => TtrfieldsfType::class,

        ));
    


    /*
        //entidad TtrFieldsType
        $builder->add('ttrfieldsf', CollectionType::class, array(
            'label'=>'CAMPOS DEL FORMULARIO',
            'attr'=>array('style'=>'margin-top:20px'),
            'entry_type' => TtrfieldsfType::class,

        ));
*/


    }



        public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Ttrform::class,
        ));
    }


}
