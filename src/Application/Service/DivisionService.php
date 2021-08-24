<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\DTO\Division;
use App\Domain\Division\Number;
use App\Domain\Division\Precision;

final class DivisionService
{
    private Precision $precision;

    public function __construct(int $precision)
    {
        $this->precision = Precision::fromInt($precision);
    }

    public function performDivision(Division $input): Number
    {
        return Number::fromString($input->divisible, $this->precision)
            ->divide(
                Number::fromString($input->divisor, $this->precision),
                $this->precision
            );
    }
}
