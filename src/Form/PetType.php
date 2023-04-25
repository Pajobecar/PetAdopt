<?php

namespace App\Form;

use App\Entity\Pet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;




class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2", "placeholder" => "Name:"]))
            ->add('species' , null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2", "placeholder" => "Species:"]))
            ->add('breed' , null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2", "placeholder" => "Breed:"]))
            ->add('age' , null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2", "placeholder" => "Age:"]))
            ->add('location' , null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2", "placeholder" => "Location:"]))
            ->add('image', FileType::class, [
                'label' => 'Image (jpg, png, jpeg file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                'attr'=>["class"=>"ms-2 labeled"],
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpg',
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid png,jpg,jpeg document',
                    ])
                ],
            ])
            ->add('status' , ChoiceType::class, [
                'choices'  => [
                    'Available' => 'available',
                    'Adopted' => 'adopted',
                    
                ]])
            ->add('description' , null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2 mt-2", "placeholder" => "Description:"]))
            ->add('needs' , null, array("attr"=>["class"=>"form-control text2 fs-5 w-25 mb-2", "placeholder" => "Needs:"]))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}
