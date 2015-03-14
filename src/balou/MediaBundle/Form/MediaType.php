<?php

namespace balou\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MediaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreMedia', 'text' , array('attr'=> array('class' =>'form-control')))
            ->add('tailleMedia')
            ->add('descriptionMedia', 'text' , array('attr'=> array('class' =>'form-control')))
            ->add('fichierMedia')
            ->add('urlMedia', 'text' , array('attr'=> array('class' =>'form-control')))
            ->add('altMedia')
            ->add('lienMedia')
            ->add('file','file',array('required' => false ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'balou\MediaBundle\Entity\Media'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'balou_mediabundle_media';
    }
}
