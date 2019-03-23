<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Acme\HelloWorld;

final class HelloWorldTest extends TestCase
{
    public function testCanBeUsedWithAlphaNumericString(): void
    {
        $this->assertEquals(
            'Hello l337ers!',
            Acme\HelloWorld::fromString('l337ers')
        );
        $this->assertEquals(
            'Hello Agent 42!',
            Acme\HelloWorld::fromString('Agent 42')
        );
    }

    public function testRemovesAdditionalExclamationMarks(): void
    {
        $this->assertEquals(
            'Hello World!',
            Acme\HelloWorld::fromString('World!')
        );
        $this->assertEquals(
            'Hello World!',
            Acme\HelloWorld::fromString('World!')
        );
        $this->assertEquals(
            'Hello World!',
            Acme\HelloWorld::fromString('World!!!')
        );
    }
}
