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
use Ergebnis\DataProvider\NullProvider;
use Ergebnis\DataProvider\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(AbstractProvider::class)]
#[Framework\Attributes\CoversClass(NullProvider::class)]
final class NullProviderTest extends AbstractProviderTestCase
{
    #[Framework\Attributes\DataProviderExternal(NullProvider::class, 'null')]
    public function testNullProvidesNull(mixed $value): void
    {
        self::assertNull($value);
    }

    public function testNullReturnsGeneratorThatProvidesNull(): void
    {
        $specifications = [
            'null' => Test\Util\Specification\Identical::create(null),
        ];

        $provider = NullProvider::null();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
