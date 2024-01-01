<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider;

final class UuidProvider extends AbstractProvider
{
    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function arbitrary(): \Generator
    {
        yield from self::provideDataForValues(self::values());
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function caseLower(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (string $value): bool {
            return \strtolower($value) === $value;
        });
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function caseUpper(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (string $value): bool {
            return \strtoupper($value) === $value;
        });
    }

    /**
     * @return array<string, string>
     */
    private static function values(): array
    {
        $faker = self::faker();

        return [
            'uuid-case-lower' => \strtolower($faker->uuid()),
            'uuid-case-upper' => \strtoupper($faker->uuid()),
        ];
    }
}
