<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class BookingHourWithinOpeningHours extends Constraint
{
    public $openingHours;
    public $message = 'The selected hour is outside of the opening hours.';

    public function validatedBy()
    {
        return BookingHourValidator::class;
    }
}
