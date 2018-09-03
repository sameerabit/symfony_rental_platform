<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/06/18
 * Time: 19:08
 */

namespace AppBundle\Forms;


use AppBundle\Entity\Photo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageUploadFormType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url',FileType::class,array(
            'label' => false,'data_class' => null
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Photo::class
        ));
    }

}