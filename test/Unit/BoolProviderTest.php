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
 * @covers \Ergebnis\DataProvider\BoolProvider
 */
final class BoolProviderTest extends AbstractProviderTestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\BoolProvider::arbitrary
     *
     * @param mixed $value
     */
    public function testArbitraryProvidesBool($value): void
    {
        self::assertIsBool($value);
    }

    public function testArbitraryReturnsGeneratorThatProvidesBoolValues(): void
    {
        $specifications = [
            'bool-false' => DataProvider\Test\Util\Specification\Identical::create(false),
            'bool-true' => DataProvider\Test\Util\Specification\Identical::create(true),
        ];

        $provider = DataProvider\BoolProvider::arbitrary();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\BoolProvider::false
     *
     * @param mixed $value
     */
    public function testFalseProvidesFalse($value): void
    {
        self::assertFalse($value);
    }

    public function testFalseReturnsGeneratorThatProvidesFalse(): void
    {
        $specifications = [
            'bool-false' => DataProvider\Test\Util\Specification\Identical::create(false),
        ];

        $provider = DataProvider\BoolProvider::false();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\BoolProvider::true
     *
     * @param mixed $value
     */
    public function testTrueProvidesTrue($value): void
    {
        self::assertTrue($value);
    }

    public function testTrueReturnsGeneratorThatProvidesTrue(): void
    {
        $specifications = [
            'bool-true' => DataProvider\Test\Util\Specification\Identical::create(true),
        ];

        $provider = DataProvider\BoolProvider::true();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
