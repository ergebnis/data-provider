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

namespace Ergebnis\DataProvider\Test\Unit;

use Ergebnis\DataProvider;

/**
 * @covers \Ergebnis\DataProvider\AbstractProvider
 * @covers \Ergebnis\DataProvider\ResourceProvider
 */
final class ResourceProviderTest extends AbstractProviderTestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\ResourceProvider::resource
     *
     * @param mixed $value
     */
    public function testResourceProvidesResource($value): void
    {
        self::assertIsResource($value);
    }

    public function testResourceReturnsGeneratorThatProvidesResource(): void
    {
        $specifications = [
            'resource' => DataProvider\Test\Util\Specification\Closure::create(static function ($value): bool {
                return \is_resource($value);
            }),
        ];

        $provider = DataProvider\ResourceProvider::resource();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
