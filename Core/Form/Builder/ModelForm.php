<?php

namespace MillenniumFalcon\Core\Form\Builder;

//use MillenniumFalcon\Core\Form\Type\ChoiceMultiJson;
use MillenniumFalcon\Core\Form\Type\ChoiceMultiJson;

use MillenniumFalcon\Core\ORM\_Model;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ModelForm extends AbstractType
{

    public function getBlockPrefix()
    {
        return 'model';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $defaultSortByOptions = isset($options['defaultSortByOptions']) ? $options['defaultSortByOptions'] : array();
        $dataGroups = isset($options['dataGroups']) ? $options['dataGroups'] : array();

        $builder
            ->add('title', TextType::class, array(
                'label' => 'Name:',
                'constraints' => array(
                    new Assert\NotBlank()
                )
            ))
            ->add('className', TextType::class, array(
                'label' => 'Class name:',
                'constraints' => array(
                    new Assert\NotBlank()
                )
            ))
            ->add('modelType', ChoiceType::class, array(
                'label' => 'Model type:',
                'choices' => array(
                    'Customised' => 0,
                    'Built in' => 1,
                )
            ))
            ->add('listType', ChoiceType::class, array(
                'label' => 'Listing type:',
                'choices' => array(
                    'Drag & Drop' => 0,
                    'Pagination' => 1,
                    'Tree' => 2,
                )
            ))
            ->add('numberPerPage', TextType::class, array(
                'label' => 'Page size:',
            ))
            ->add('defaultSortBy', ChoiceType::class, array(
                'label' => 'Default sorted By:',
                'choices' => $defaultSortByOptions,
            ))
            ->add('dataType', ChoiceType::class, array(
                'label' => 'Visibility:',
                'choices' => array(
                    'Show' => 0,
                    'Hidden' => 3,
                )
            ))
            ->add('defaultOrder', ChoiceType::class, array(
                'label' => 'Default order:',
                'choices' => array(
                    'ASC' => 0,
                    'DESC' => 1,
                )
            ))
            ->add('siteMapUrl', TextType::class, array(
                'label' => 'Frontend URL:',
            ))
            ->add('dataGroups', ChoiceMultiJson::class, array(
                'label' => 'Choose menu items:',
                'choices' => $dataGroups,
            ))
            ->add('presetData', ChoiceType::class, array(
                'label' => 'Preset-data:',
                'expanded' => true,
                'multiple' => true,
                'choices' => _Model::presetData,
            ))
            ->add('metadata', ChoiceType::class, array(
                'label' => 'Metadata:',
                'expanded' => true,
                'multiple' => true,
                'choices' => _Model::getMetadataChoices(),
            ))
            ->add('columnsJson', TextareaType::class);


        $builder->get('presetData')
            ->addModelTransformer(new CallbackTransformer(
                function ($data) {
                    return gettype($data) == 'string' ? (array)json_decode($data) : array();
                },
                function ($data) {
                    return gettype($data) == 'array' ? json_encode($data) : '[]';
                }
            ))
        ;

        $builder->get('metadata')
            ->addModelTransformer(new CallbackTransformer(
                function ($data) {
                    return gettype($data) == 'string' ? json_decode($data) : array();
                },
                function ($data) {
                    return gettype($data) == 'array' ? json_encode($data) : '[]';
                }
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            'defaultSortByOptions' => array(),
            'dataGroups' => array(),
        ));
    }
}
