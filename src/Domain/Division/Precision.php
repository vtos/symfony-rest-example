<?php

declare(strict_types=1);

namespace App\Domain\Division;

use Webmozart\Assert\Assert;

/**
 * A value object which defines the precision of a float number.
 */
final class Precision
{
    private const UPPER_LIMIT = 5;

    private int $precision;

    private function __construct(int $precision)
    {
        Assert::lessThanEq($precision, self::UPPER_LIMIT);
        Assert::greaterThanEq($precision, 0);

        $this->precision = $precision;
    }

    public function value(): int
    {
        return $this->precision;
    }

    public static function fromInt(int $precision): self
    {
        return new self($precision);
    }
}
