<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    
        $builder
        //Ajouter le nom de la réservation
            ->add('bookingName', null, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 3,
                    'maxlength' => 50,
                ],
                'label' => 'Nom de la réservation',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 50,
                    ]),
                ],
            ])
            ->add('guestsNumber', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 1,
                    'maxlength' => 6,
                ],
                'label' => 'Nombre de couverts',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 1,
                        'max' => 6,
                    ]),
                ],
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ],
            ] )
            ->add('bookingDate', DateType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Date de réservation',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new NotNull(),
                ],
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                
            ])
           
            
                ->add('bookingHour', ChoiceType::class, [
                    'attr' => [
                        'class' => 'form-control',
                        'minlength' => 1,
                        'maxlength' => 6,
                    ],
                    'label' => 'Nombre de couverts',
                    'label_attr' => [
                        'class' => 'form-label mt-4',
                    ],
                    'constraints' => [
                        new NotBlank(),
                        new Length([
                            'min' => 1,
                            'max' => 6,
                        ]),
                    ],
                    'placeholder' => 'Choisissez une heure',
                    'choices' => [
                        '12h00' => '12h00',
                        '12h15' => '12h15',
                        '12h30' => '12h30',
                        '12h45' => '12h45',
                        '13h00' => '13h00',
                        '13h15' => '13h15',
                        '13h30' => '13h30',
                        '13h45' => '13h45',
                        '14h00' => '14h00',
                  
                    
                    
                ]])
            

            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4',
                ],
                'label' => 'Réserver',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
