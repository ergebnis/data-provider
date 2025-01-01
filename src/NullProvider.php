<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider;

final class NullProvider extends AbstractProvider
{
    /**
     * @return \Generator<string, array{0: null}>
     */
    public static function null(): \Generator
    {
        yield from self::provideDataForValues([
            'null' => null,
        ]);
    }
}
