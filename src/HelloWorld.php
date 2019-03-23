<?php
declare(strict_types=1);

namespace Acme;

final class HelloWorld
{
    private $who;

    private function __construct(string $who)
    {
        $this->who = rtrim($who, "!");
    }

    public static function fromString(string $who): self
    {
        return new self($who);
    }

    public function __toString(): string
    {
        return "Hello " . $this->who . "!";
    }
}
