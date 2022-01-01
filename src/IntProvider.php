<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021-2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider;

final class IntProvider extends AbstractProvider
{
    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function arbitrary(): \Generator
    {
        yield from self::provideDataForValues(self::values());
    }

    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function lessThanZero(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (int $value): bool {
            return 0 > $value;
        });
    }

    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function zero(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (int $value): bool {
            return 0 === $value;
        });
    }

    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function greaterThanZero(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (int $value): bool {
            return 0 < $value;
        });
    }

    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function lessThanOne(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (int $value): bool {
            return 1 > $value;
        });
    }

    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function one(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (int $value): bool {
            return 1 === $value;
        });
    }

    /**
     * @return \Generator<string, array{0: int}>
     */
    public static function greaterThanOne(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (int $value): bool {
            return 1 < $value;
        });
    }

    /**
     * @return array<string, int>
     */
    private static function values(): array
    {
        $faker = self::faker();

        return [
            'int-less-than-minus-one' => -1 * $faker->numberBetween(1),
            'int-minus-one' => -1,
            'int-zero' => 0,
            'int-plus-one' => 1,
            'int-greater-than-plus-one' => $faker->numberBetween(1),
        ];
    }
}
