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
use Ergebnis\DataProvider\ObjectProvider;
use Ergebnis\DataProvider\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(AbstractProvider::class)]
#[Framework\Attributes\CoversClass(ObjectProvider::class)]
final class ObjectProviderTest extends AbstractProviderTestCase
{
    #[Framework\Attributes\DataProviderExternal(ObjectProvider::class, 'object')]
    public function testObjectProvidesObject(mixed $value): void
    {
        self::assertIsObject($value);
    }

    public function testObjectReturnsGeneratorThatProvidesObject(): void
    {
        $specifications = [
            'object' => Test\Util\Specification\Equal::create(new \stdClass()),
        ];

        $provider = ObjectProvider::object();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
