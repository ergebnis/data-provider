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

namespace Ergebnis\DataProvider\Test\Unit;

use Ergebnis\DataProvider\NullProvider;
use Ergebnis\DataProvider\Test;

/**
 * @internal
 *
 * @covers \Ergebnis\DataProvider\AbstractProvider
 * @covers \Ergebnis\DataProvider\NullProvider
 */
final class NullProviderTest extends AbstractProviderTestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\NullProvider::null()
     *
     * @param mixed $value
     */
    public function testNullProvidesNull($value): void
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
