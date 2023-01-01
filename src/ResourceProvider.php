<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider;

final class ResourceProvider extends AbstractProvider
{
    /**
     * @return \Generator<string, array{0: resource}>
     */
    public static function resource(): \Generator
    {
        yield from self::provideDataForValues([
            'resource' => \fopen(__FILE__, 'rb'),
        ]);
    }
}
