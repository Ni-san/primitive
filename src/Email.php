<?php

namespace nisan\primitive;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email
{
    private $value;

    public function __construct(string $value)
    {
        $validator = (new EmailValidator());
        $valid = $validator->isValid($value, new RFCValidation());

        if (!$valid) {
            throw new InvalidValueException(
                $validator->getError()->getMessage(),
                $validator->getError()->getCode(),
                $validator->getError()
            );
        }

        $this->value = $value;
    }

    public function get()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return $this->value;
    }
}
