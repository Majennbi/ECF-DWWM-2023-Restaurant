<?php

namespace App\Validator;

use App\Entity\Booking;
use App\Entity\OpeningHours;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BookingHourValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof Booking) {
            return;
        }

        $openingHours = $value->getOpeningHours();
        if (!$openingHours) {
            return;
        }

        $bookingHour = $value->getBookingHour();
        if (!$bookingHour) {
            return;
        }

        $startHour = $openingHours->getStartHour();
        $endHour = $openingHours->getEndHour();
        if ($bookingHour < $startHour || $bookingHour >= $endHour) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ start_hour }}', $startHour->format('Y-m-d H:i:s'))
                ->setParameter('{{ end_hour }}', $endHour->format('Y-m-d H:i:s'))
                ->addViolation();
        }
    }
}
