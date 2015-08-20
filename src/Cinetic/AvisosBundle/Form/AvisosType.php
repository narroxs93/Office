<?php

namespace Cinetic\AvisosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AvisosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text')
            ->add('descripcion','textarea')
            ->add('metodo', 'choice', array(
                'choices' => array(
                    'popup' => 'Popup',
                    'teaser' => 'Teaser',
                    'banner' => 'Bloque/Banner',
                    'faldon' => 'Faldón',
                ),
                'expanded' => true,
            ))
            ->add('condicion','choice',array(
                'choices' => array(
                    'pagina' => 'Página específica',
                    'tiempo' => 'Tiempo en página',
                    'numero' => 'Número de páginas vistas',
                    'scroll' => 'Scroll',
                ),
                'expanded' => true,
            ))
            ->add('pagina','text', array(
                'required' => false
            ))
            ->add('tiempo','text',array(
                'required' => false
            ))
            ->add('numero','text',array(
                'required' => false
            ))
            ->add('scroll','text', array(
                'required' => false
            ))
            ->add('repeticion','choice',array(
                'choices' => array(
                    '0' => 'Una sola vez',
                    '1' => 'A cada condición',
                ),
                'expanded' => true,
            ))
            ->add('destino','choice',array(
                'choices' => array(
                    '0' => "Cualquiera",
                    '1' => "Solo autentificados",
                    '2' => "Solo sin autentificar",
                    '3' => "Del grupo:",
                    '4' => "ID del usuario",
                ),
                'expanded' => true,
            ))
            ->add('grupo','text',array(
                'required' => false
            ))
            ->add('usuario','text',array(
                'required' => false
            ))
            ->add('codigo','textarea',array(
                'required' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cinetic\AvisosBundle\Entity\Avisos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cinetic_avisosbundle_avisos';
    }
}
