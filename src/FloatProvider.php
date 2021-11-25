<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider;

final class FloatProvider extends AbstractProvider
{
    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function arbitrary(): \Generator
    {
        yield from self::provideDataForValues(self::values());
    }

    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function lessThanZero(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (float $value): bool {
            return 0.0 > $value;
        });
    }

    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function zero(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (float $value): bool {
            return 0.0 === $value;
        });
    }

    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function greaterThanZero(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (float $value): bool {
            return 0.0 < $value;
        });
    }

    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function lessThanOne(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (float $value): bool {
            return 1.0 > $value;
        });
    }

    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function one(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (float $value): bool {
            return 1.0 === $value;
        });
    }

    /**
     * @return \Generator<string, array{0: float}>
     */
    public static function greaterThanOne(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (float $value): bool {
            return 1.0 < $value;
        });
    }

    /**
     * @return array<string, float>
     */
    private static function values(): array
    {
        $faker = self::faker();

        return [
            'float-less-than-minus-one' => -0.01 - $faker->randomFloat(null, 1),
            'float-minus-one' => -1.0,
            'float-zero' => 0.0,
            'float-plus-one' => 1.0,
            'float-greater-than-plus-one' => 0.01 + $faker->randomFloat(null, 1),
        ];
    }
}
