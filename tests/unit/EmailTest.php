<?php

namespace tests\unit;

use nisan\primitive\Email;
use nisan\primitive\InvalidValueException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    const EMAIL = 'ni.san.qwer@gmail.com';

    const NOT_AN_EMAIL = 'Not an email';

    public function testCreate()
    {
        $email = new Email(self::EMAIL);

        $this->assertInstanceOf(Email::class, $email);
    }

    public function testNotCreate()
    {
        try {
            new Email(self::NOT_AN_EMAIL);
            $this->assertTrue(false);
        } catch (InvalidValueException $e) {
            $this->assertTrue(true);
        }
    }

    public function testToString()
    {
        $email = new Email(self::EMAIL);

        $this->assertSame(self::EMAIL, (string)$email);
    }
}
