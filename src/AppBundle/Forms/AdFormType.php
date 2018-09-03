<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/06/18
 * Time: 12:16
 */

namespace AppBundle\Forms;


use AppBundle\Entity\Ad;
use AppBundle\Entity\Category;
use AppBundle\Entity\FrequencyType;
use AppBundle\Entity\Location;
use AppBundle\Entity\SubCategory;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', HiddenType::class);
        $builder->add('title',TextType::class,array(
            'attr' => ['class' => 'field'],
        ));
        $builder->add('description', TextareaType::class,array(
            'required' => false
        ));
        $builder->add('cost', NumberType::class);
        $builder->add('rentFrequency', TextType::class);
        $builder->add('frequencyType', EntityType::class, array(
            'class' => FrequencyType::class,
            'attr' => ['class' => 'ui fluid search dropdown'],
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('ft')
                    ->orderBy('ft.name,ft.id', 'ASC');
            },
            'choice_label' => 'name',
        ));
        $builder->add('contactNumber', TextType::class);
        $builder->add('subCategory', EntityType::class, array(
            'class' => SubCategory::class,
            'attr' => ['class' => 'ui fluid search dropdown'],
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('sc')
                    ->orderBy('sc.name,sc.id', 'ASC');
            },
            'choice_label' => 'name',
        ));
        $builder->add('location', EntityType::class, array(
            'class' => Location::class,
            'attr' => ['class' => 'ui fluid search dropdown'],
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('l')
                    ->orderBy('l.name,l.id', 'ASC');
            },
            'choice_label' => 'name',
        ));
        $builder->add('photos', CollectionType::class, array(
            'entry_type' => ImageUploadFormType::class,
            'required' => false,
            'entry_options' => array('label' => false),
        ));
        $builder->add('Next', SubmitType::class, array(
            'label' => 'Submit',
            'attr' => ['class' => 'ui button']
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Ad::class
        ));
    }

}