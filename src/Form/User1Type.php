<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, array("attr"=>["class"=>"bg-dark text2 fs-5 w-50 text-white form-control mb-2"]))
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',"class"=>"bg-dark text2 text-white fs-5 w-50 form-control mb-2"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('fname', null, array("attr"=>["class"=>"bg-dark text2 fs-5 w-50 text-white form-control mb-2"]))
            ->add('lname', null, array("attr"=>["class"=>"bg-dark text2 fs-5 w-50 text-white form-control mb-2"]))
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Male' => 'male',
                    'Female' => 'female',
                    
                ], 'attr' => ["class"=>"bg-dark text-light text2 fs-5 round form-control w-50 my-2"],])
            ->add('city', null, array("attr"=>["class"=>"bg-dark text2 fs-5 w-50 text-white form-control mb-2"]))
            // ->add('bdate', null, array("attr"=>["class"=>"bg-dark text2 fs-5 w-50 text-white form-control mb-2"]))
            ->add('bdate', DateType::class, array('years' => range(date('Y')-100, date('Y')),
            "attr"=>["class"=>"fs-5 w-50 "],
            'placeholder' => [
                'year' => "year", 'month' => 'Month', 'day' => 'Day'
            ]
            ))
            ->add('image', FileType::class,[
                'label' => 'Image (jpg, png, jpeg file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                'attr' => ["class"=>"bg-dark text-light text fs-5 round form-control w-50 my-2"],

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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
