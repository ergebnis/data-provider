<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021-2026 Andreas Möller
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
     * @throws Exception\ResourceCanNotBeOpened
     *
     * @return \Generator<string, array{0: resource}>
     */
    public static function resource(): \Generator
    {
        $resource = \fopen(
            __FILE__,
            'rb',
        );

        if (!\is_resource($resource)) {
            throw Exception\ResourceCanNotBeOpened::at(__FILE__);
        }

        yield from self::provideDataForValues([
            'resource' => $resource,
        ]);
    }
}
