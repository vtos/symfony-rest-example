<?php

declare(strict_types=1);

namespace App\Tests\Unit\Application\Service;

use App\Application\DTO\Division;
use App\Application\Service\DivisionService;
use App\Domain\Division\Number;
use App\Domain\Division\Precision;
use PHPUnit\Framework\TestCase;

class DivisionServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_performs_division(): void
    {
        $precision = 5;

        // Emulate a DTO object first.
        $input = new Division();
        $input->divisible = '4,48854892544';
        $input->divisor = '5';

        $divisionResult = (new DivisionService($precision))->performDivision($input);

        $this->assertEquals(
            Number::fromString('0,89771', Precision::fromInt($precision)),
            $divisionResult
        );
    }
}
