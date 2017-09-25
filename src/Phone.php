<?php

namespace nisan\primitive;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

class Phone
{
    private $value;

    public function __construct(string $value)
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        try {
            $this->value = $phoneNumberUtil->parse($value);
        } catch (NumberParseException $e) {
            throw new InvalidValueException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function get() {
        return $this->__toString();
    }

    public function __toString()
    {
        return '+' . $this->value->getCountryCode() . $this->value->getNationalNumber();
    }
}
