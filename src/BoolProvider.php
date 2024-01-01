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

final class BoolProvider extends AbstractProvider
{
    /**
     * @return \Generator<string, array{0: bool}>
     */
    public static function arbitrary(): \Generator
    {
        yield from self::provideDataForValues(self::values());
    }

    /**
     * @return \Generator<string, array{0: bool}>
     */
    public static function false(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (bool $value): bool {
            return false === $value;
        });
    }

    /**
     * @return \Generator<string, array{0: bool}>
     */
    public static function true(): \Generator
    {
        yield from self::provideDataForValuesWhere(self::values(), static function (bool $value): bool {
            return $value;
        });
    }

    /**
     * @return array<string, bool>
     */
    private static function values(): array
    {
        return [
            'bool-false' => false,
            'bool-true' => true,
        ];
    }
}
