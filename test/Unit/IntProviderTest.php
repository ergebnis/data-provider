<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider\Test\Unit;

use Ergebnis\DataProvider\IntProvider;
use Ergebnis\DataProvider\Test;

/**
 * @internal
 *
 * @covers \Ergebnis\DataProvider\AbstractProvider
 * @covers \Ergebnis\DataProvider\IntProvider
 */
final class IntProviderTest extends AbstractProviderTestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\IntProvider::arbitrary()
     *
     * @param mixed $value
     */
    public function testArbitraryProvidesInt($value): void
    {
        self::assertIsInt($value);
    }

    public function testArbitraryReturnsGeneratorThatProvidesIntValues(): void
    {
        $specifications = [
            'int-less-than-minus-one' => Test\Util\Specification\Closure::create(static function (int $value): bool {
                return -1 > $value;
            }),
            'int-minus-one' => Test\Util\Specification\Identical::create(-1),
            'int-zero' => Test\Util\Specification\Identical::create(0),
            'int-plus-one' => Test\Util\Specification\Identical::create(1),
            'int-greater-than-plus-one' => Test\Util\Specification\Closure::create(static function (int $value): bool {
                return 1 < $value;
            }),
        ];

        $provider = IntProvider::arbitrary();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\IntProvider::lessThanZero()
     */
    public function testLessThanZeroProvidesIntLessThanZero(int $value): void
    {
        self::assertLessThan(0, $value);
    }

    public function testLessThanZeroReturnsGeneratorThatProvidesIntLessThanZero(): void
    {
        $specifications = [
            'int-less-than-minus-one' => Test\Util\Specification\Closure::create(static function (int $value): bool {
                return -1 > $value;
            }),
            'int-minus-one' => Test\Util\Specification\Identical::create(-1),
        ];

        $provider = IntProvider::lessThanZero();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\IntProvider::zero()
     */
    public function testZeroProvidesZero(int $value): void
    {
        self::assertSame(0, $value);
    }

    public function testZeroReturnsGeneratorThatProvidesZero(): void
    {
        $specifications = [
            'int-zero' => Test\Util\Specification\Identical::create(0),
        ];

        $provider = IntProvider::zero();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\IntProvider::greaterThanZero()
     */
    public function testGreaterThanZeroProvidesIntGreaterThanZero(int $value): void
    {
        self::assertGreaterThan(0, $value);
    }

    public function testGreaterThanZeroReturnsGeneratorThatProvidesIntGreaterThanZero(): void
    {
        $specifications = [
            'int-plus-one' => Test\Util\Specification\Identical::create(1),
            'int-greater-than-plus-one' => Test\Util\Specification\Closure::create(static function (int $value): bool {
                return 1 < $value;
            }),
        ];

        $provider = IntProvider::greaterThanZero();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\IntProvider::lessThanOne()
     */
    public function testLessThanOneProvidesIntLessThanOne(int $value): void
    {
        self::assertLessThan(1, $value);
    }

    public function testLessThanOneReturnsGeneratorThatProvidesIntLessThanOne(): void
    {
        $specifications = [
            'int-less-than-minus-one' => Test\Util\Specification\Closure::create(static function (int $value): bool {
                return -1 > $value;
            }),
            'int-minus-one' => Test\Util\Specification\Identical::create(-1),
            'int-zero' => Test\Util\Specification\Identical::create(0),
        ];

        $provider = IntProvider::lessThanOne();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testOneReturnsGeneratorThatProvidesOne(): void
    {
        $specifications = [
            'int-plus-one' => Test\Util\Specification\Identical::create(1),
        ];

        $provider = IntProvider::one();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\IntProvider::greaterThanOne()
     */
    public function testGreaterThanOneProvidesIntGreaterThanOne(int $value): void
    {
        self::assertGreaterThan(1, $value);
    }

    public function testGreaterThanOneReturnsGeneratorThatProvidesIntGreaterThanOne(): void
    {
        $specifications = [
            'int-greater-than-plus-one' => Test\Util\Specification\Closure::create(static function (int $value): bool {
                return 1 < $value;
            }),
        ];

        $provider = IntProvider::greaterThanOne();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
