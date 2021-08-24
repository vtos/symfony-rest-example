<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Division;

use App\Tests\Unit\NumberTestCase;
use InvalidArgumentException;
use App\Domain\Division\Divisor;
use App\Domain\Division\Precision;

class DivisorTest extends NumberTestCase
{
    protected string $classUnderTest = Divisor::class;

    /**
     * @test
     */
    public function it_fails_when_instantiated_from_zero(): void
    {
        $precision = 5;

        $this->expectException(InvalidArgumentException::class);
        Divisor::fromString('0', Precision::fromInt($precision));
    }
}
