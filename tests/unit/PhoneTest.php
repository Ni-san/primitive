<?php

namespace tests\unit;

use nisan\primitive\InvalidValueException;
use nisan\primitive\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    const PHONE_NUMBER = '+79237260128';

    const NOT_A_PHONE_NUMBER = 'not a phone';

    public function testCreate()
    {
        $phone = new Phone(self::PHONE_NUMBER);

        $this->assertInstanceOf(Phone::class, $phone);
    }

    public function testNotCreate()
    {
        try {
            new Phone(self::NOT_A_PHONE_NUMBER);
            $this->assertTrue(false);
        } catch (InvalidValueException $e) {
            $this->assertTrue(true);
        }
    }

    public function testToString()
    {
        $phone = new Phone(self::PHONE_NUMBER);

        $this->assertSame(self::PHONE_NUMBER, (string)$phone);
    }
}
