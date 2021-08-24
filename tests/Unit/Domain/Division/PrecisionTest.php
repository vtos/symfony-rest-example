<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Division;

use App\Domain\Division\Precision;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PrecisionTest extends TestCase
{
    /**
     * @test
     */
    public function it_fails_when_instantiated_with_a_negative_value(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Precision::fromInt(-2);
    }

    /**
     * @test
     */
    public function it_fails_when_instantiated_with_a_value_above_the_limit(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Precision::fromInt(6);
    }
}
