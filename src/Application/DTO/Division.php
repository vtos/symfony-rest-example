<?php

declare(strict_types=1);

namespace App\Application\DTO;

/**
 * A simple DTO (data transfer object) to carry input data to the domain. It is used to explicitly define what
 * the input data should look like.
 */
final class Division
{
    public string $divisible;

    public string $divisor;
}
