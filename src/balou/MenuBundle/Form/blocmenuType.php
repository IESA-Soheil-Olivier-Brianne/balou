<?php

namespace balou\MenuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class blocmenuType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text' , array('attr'=> array('class' =>'form-control')))
            ->add('description', 'text' , array('attr'=> array('class' =>'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'balou\MenuBundle\Entity\blocmenu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'balou_menubundle_blocmenu';
    }
}
