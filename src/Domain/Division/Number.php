<?php

declare(strict_types=1);

namespace App\Domain\Division;

/**
 * A value object which represents a number that can be divided.
 */
final class Number
{
    use FromString;

    private float $number;

    protected function __construct(float $number)
    {
        $this->number = $number;
    }

    public function divide(Number $number, Precision $precision): self
    {
        return self::fromString(
            (string)($this->number / $number->value()),
            $precision
        );
    }

    public function value(): float
    {
        return $this->number;
    }

    public static function fromString(string $string, Precision $precision): self
    {
        return new self(
            self::extractFloatFromString($string, $precision)
        );
    }
}
