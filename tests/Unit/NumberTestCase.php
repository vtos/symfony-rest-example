<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Domain\Division\Precision;

/**
 * This test case is shared between several classes, to avoid duplicating of code for their tests we define
 * the class name which is under test. The class name is defined as a property in child classes of this test case class.  
 */
class NumberTestCase extends TestCase
{
    public function invalidStringsForNumber(): array
    {
        return [
            ['45.48.47', 5],
            ['gkls5gfh', 5],
            ['14e+15', 5],
            ['.18523', 5],
            [',4589', 5],
            ['-45,454,0', 5],
            ['123e-4', 5],
        ];
    }

    /**
     * @test
     */
    public function it_can_be_instantiated_from_a_valid_string(): void
    {
        $classUnderTest = $this->classUnderTest;

        $precision = Precision::fromInt(5);

        $this->assertEquals(
            4.52689,
            $classUnderTest::fromString('4,52689', $precision)->value()
        );
        $this->assertEquals(
            3.4,
            $classUnderTest::fromString('3.4', $precision)->value()
        );
        $this->assertEquals(
            878,
            $classUnderTest::fromString('878', $precision)->value()
        );
        $this->assertEquals(
            0.25564,
            $classUnderTest::fromString('0.255641656584888', $precision)->value()
        );
        $this->assertEquals(
            1.25848,
            $classUnderTest::fromString('1.2584794455', $precision)->value()
        );
    }

    /**
     * @test
     * @dataProvider invalidStringsForNumber
     */
    public function it_fails_when_instantiated_from_an_invalid_string(string $string, int $precisionAsInt): void
    {
        $classUnderTest = $this->classUnderTest;

        $precision = Precision::fromInt($precisionAsInt);

        $this->expectException(InvalidArgumentException::class);
        $classUnderTest::fromString($string, $precision);
    }
}
