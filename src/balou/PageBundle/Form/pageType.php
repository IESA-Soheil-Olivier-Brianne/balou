<?php

namespace balou\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class pageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content','textarea', array('attr' => array('class' => 'ckeditor')))
            ->add('url')
            ->add('isPublished','checkbox', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'balou\PageBundle\Entity\page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'balou_pagebundle_page';
    }
}
