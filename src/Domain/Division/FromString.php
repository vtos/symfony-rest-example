<?php

declare(strict_types=1);

namespace App\Domain\Division;

use Webmozart\Assert\Assert;

/**
 * This trait is used to apply ability to transform a string to a float to the object which need it.
 * See @link Number, Divisor.
 */
trait FromString
{
    private static function extractFloatFromString(string $string, Precision $precision): float
    {
        $string = str_replace(',', '.', $string);
        Assert::regex(
            $string,
            "~^-?[0-9]+(\.[0-9]+)?$~xD"
        );

        return (float)number_format((float)$string, $precision->value(), '.', '');
    }
}
