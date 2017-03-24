<?php
namespace AppBundle\Form;

use AppBundle\Entity\Ttrfieldsf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TtrfieldsfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('labelName', TextType::class, array('attr' => array('class' => 'form-control'),'label'=>'Titulo del campo'))
        ->add('typefield', ChoiceType::class, array( 
            'attr' => array('class' => 'form-control'),
            'label'=>'Tipo de campo',
            'choices'  => array(
                'select' => 'select',
                'text' => 'text',
                'checkbox' => 'checkbox',
            ),
        ))
        ->add('active', ChoiceType::class, array( 
            'attr' => array('class' => 'form-control'),
            'label'=>'El estado del campo es...',
            'choices'  => array(
                'Activo' => 1,
                'Inactivo' => 0,
            ),
        ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Ttrfieldsf::class,
        ));
    }
}