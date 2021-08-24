<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Division;

use App\Tests\Unit\NumberTestCase;
use App\Domain\Division\Number;
use App\Domain\Division\Precision;

class NumberTest extends NumberTestCase
{
    protected string $classUnderTest = Number::class;

    public function numbersForDivision(): array
    {
        return [
            ['40', '20', 2, 5],
            ['1.2584784455', '5,1547', 0.24414, 5],
            ['-258478', '515', -501.89903, 5],
            ['-258,789', '-1.687998', 153.13, 2],
        ];
    }

    /**
     * @test
     * @dataProvider numbersForDivision
     */
    public function it_can_be_divided(
        string $number,
        string $divisor,
        float $expectedResult,
        int $precisionAsInt
    ): void {
        $precision = Precision::fromInt($precisionAsInt);

        $divided = Number::fromString($number, $precision)
            ->divide(
                Number::fromString($divisor, $precision),
                $precision
            )
            ->value();

        $this->assertEquals($expectedResult, $divided);
    }
}
