<?php

namespace balou\MenuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class menuType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('url')
            ->add('isClicked', 'checkbox', array('required' => false))
            ->add('blocmenu')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'balou\MenuBundle\Entity\menu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'balou_menubundle_menu';
    }
}
