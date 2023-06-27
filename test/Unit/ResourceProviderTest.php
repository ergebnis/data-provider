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

namespace Ergebnis\DataProvider\Test\Unit;

use Ergebnis\DataProvider\AbstractProvider;
use Ergebnis\DataProvider\ResourceProvider;
use Ergebnis\DataProvider\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(AbstractProvider::class)]
#[Framework\Attributes\CoversClass(ResourceProvider::class)]
final class ResourceProviderTest extends AbstractProviderTestCase
{
    #[Framework\Attributes\DataProviderExternal(ResourceProvider::class, 'resource')]
    public function testResourceProvidesResource(mixed $value): void
    {
        self::assertIsResource($value);
    }

    public function testResourceReturnsGeneratorThatProvidesResource(): void
    {
        $specifications = [
            'resource' => Test\Util\Specification\Closure::create(static function (mixed $value): bool {
                return \is_resource($value);
            }),
        ];

        $provider = ResourceProvider::resource();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
