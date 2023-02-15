<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\OpeningHours;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use PhpParser\Node\Expr\BinaryOp\GreaterOrEqual;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;
use Twig\Node\Expression\Binary\GreaterEqualBinary;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Expression;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;



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
                'input'  => 'datetime_immutable',
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
                
            ->add('openingHours', EntityType::class, [
                'class' => OpeningHours::class,
                'attr' => [
                    'class' => 'form-control',
                    
                ],
                'label' => 'Horaire d\'ouverture du restaurant',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'disabled' => true,
                'choice_label' => function (OpeningHours $openingHour) {
                    return $openingHour->getStartHour()->format('H:i') . ' - ' . $openingHour->getEndHour()->format('H:i');
                },
                
                
                ])  
                 
                ->add('bookingHour', TimeType::class, [
                    'input'  => 'datetime',
                    'minutes' => range(0, 59, 15),
                    'html5' => false,
                    'widget' => 'choice',
                    
                    'label' => 'Heure de réservation',
                    'label_attr' => [
                        'class' => 'form-label mt-4', 
                    ],
                    ])

    
            
            /*->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $booking = $event->getData();
                $form = $event->getForm();
        
                // checks if the Booking object is between the opening hours
                // If no data is passed to the form, the data is "null".
                // This should be considered a new "Product"
                if ($booking && $booking->getOpeningHours() !== null) {
                    $startHour = $booking->getOpeningHours()->getStartHour();
                    $endHour = $booking->getOpeningHours()->getEndHour();
        
                    $form->add('bookingHour', null, [
                        'constraints' => [
                            new GreaterThanOrEqual([
                                'value' => $startHour,
                                'message' => 'The booking hour must be greater than or equal to the start hour.'
                            ]),
                            new LessThanOrEqual([
                                'value' => $endHour,
                                'message' => 'The booking hour must be less than or equal to the end hour.'
                            ]),
                        ]
                    ]);
                }
            })*/

            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-booking-page mt-4',
                ],
                'label' => 'Soumettre',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
            
        ]);
    }
}
