<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class BookingHourWithinOpeningHours extends Constraint
{
    public string $message = 'The booking hour must be between the opening hours.';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
