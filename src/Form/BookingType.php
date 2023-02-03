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

            /*->add('timeSlot', TimeType::class, [
                'label' => 'Créneau horaire',
                'input' => 'datetime',
                'widget' => 'choice',
                'hours' => [12, 13, 14],
                'minutes' => [0, 15, 30, 45],
                'placeholder' => [
                    'hour' => 'Heure',
                    'minute' => 'Minute',
                ],
                'choice_translation_domain' => false,
                'choices' => array_combine($this->timeSlots, $this->timeSlots),
            ])*/
           
            
                ->add('bookingHour', ChoiceType::class, [
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'label' => 'Heure de réservation',
                    'label_attr' => [
                        'class' => 'form-label mt-4',
                    ],
                    'choices' => [
                        '12h00' => '12:00',
                        '12h15' => '12:15',
                        '12h30' => '12:30',
                        '12h45' => '12:45',
                        '13h00' => '13:00',
                        '13h15' => '13:15',
                        '13h30' => '13:30',
                        '13h45' => '13:45',
                        '14h00' => '14:00',
                        '14h15' => '14:15',
                        '14h30' => '14:30',
                        '14h45' => '14:45',],
                    'multiple' => false,
                    'expanded' => true,
                    
                    'placeholder' => 'Select a time slot',
                ])
                
            /*->add('availableSeats', DateIntervalType::class , [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nombre de places disponibles',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new NotNull(),
                ],
                'widget' => 'choice',
                'with_years' => false,
                'with_months' => false,
                'with_days' => false,
                'with_hours' => true,
                'with_minutes' => true,
                'hours' => range(0, 23),
                'minutes' => [0, 15, 30, 45],
                'input' => 'string',
                
                'labels' => [
                    'hours' => 'Heures',
                    'minutes' => 'Minutes',
                ],

            ])
            ->add('bookingHour', TimeType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Heure de réservation',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new NotNull(),
                ],
                'input'  => 'timestamp',
                'widget' => 'choice',
                'hours' => range(12, 13),
                'minutes' => range(0, 45, 15),
            ])*/
            


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
