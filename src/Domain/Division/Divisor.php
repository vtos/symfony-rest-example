<?php

declare(strict_types=1);

namespace App\Domain\Division;

use Webmozart\Assert\Assert;

/**
 * A value object representing a divisor - the number by which another number is to be divided.
 */
final class Divisor
{
    use FromString;

    private float $number;

    protected function __construct(float $number)
    {
        Assert::notEq($number, 0);

        $this->number = $number;
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
