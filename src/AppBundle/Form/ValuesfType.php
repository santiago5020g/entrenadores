<?php
namespace AppBundle\Form;

use AppBundle\Entity\Valuesf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValuesfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('description', TextType::class, array('attr' => array('class' => 'form-control'),'label'=>'Valores del campo separados por comas: Ejemplo Colombia,Chile,Argentina'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Valuesf::class,
        ));
    }
}