<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\File;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')

            

            ->add('user_username', TextType::class,[
                'label'=>'Username:',
                'required'=> true
            ])

            ->add('user_firstname', TextType::class,[
                'label'=>'First Name:',
                'required'=>true
            ])

            ->add('user_lastname', TextType::class,[
                'label'=>'Last Name:',
                'required'=>true
            ])

            ->add('user_birthday', DateType::class,[
                'label'=>'Birthday:',
                'required'=>true
            ])
            
            ->add('user_gender', ChoiceType::class, [
                'label' => 'Your Gender:',
                'choices' => [
                          'Male' => 'Male',
                          'Female' => 'Female',
                          'Other' => 'Other',
                             ],
                'expanded' => false,
                'multiple' => false,
                 ])
                
            ->add('user_picture', FileType::class, [
                'required' => true,
                'label' => 'Profile Picture:',
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '40M',
                        'mimeTypes' => [
                            'image/*',"image/jpeg" , "image/png", "image/jpg",
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file',
                    ])
                ],
            ])

            ->add('user_phonenumber', NumberType::class,[
                'label'=>'Phone Number:',
                'required'=>true
            ])











            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
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

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
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
