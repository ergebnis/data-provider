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

use Ergebnis\DataProvider\FloatProvider;
use Ergebnis\DataProvider\Test;

/**
 * @internal
 *
 * @covers \Ergebnis\DataProvider\AbstractProvider
 * @covers \Ergebnis\DataProvider\FloatProvider
 */
final class FloatProviderTest extends AbstractProviderTestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\FloatProvider::arbitrary()
     *
     * @param mixed $value
     */
    public function testArbitraryProvidesFloat($value): void
    {
        self::assertIsFloat($value);
    }

    public function testArbitraryReturnsGeneratorThatProvidesFloatValues(): void
    {
        $specifications = [
            'float-less-than-minus-one' => Test\Util\Specification\Closure::create(static function (float $value): bool {
                return -1.0 > $value;
            }),
            'float-minus-one' => Test\Util\Specification\Identical::create(-1.0),
            'float-zero' => Test\Util\Specification\Identical::create(0.0),
            'float-plus-one' => Test\Util\Specification\Identical::create(1.0),
            'float-greater-than-plus-one' => Test\Util\Specification\Closure::create(static function (float $value): bool {
                return 1.0 < $value;
            }),
        ];

        $provider = FloatProvider::arbitrary();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\FloatProvider::lessThanZero()
     */
    public function testLessThanZeroProvidesFloatLessThanZero(float $value): void
    {
        self::assertLessThan(0, $value);
    }

    public function testLessThanZeroReturnsGeneratorThatProvidesFloatLessThanZero(): void
    {
        $specifications = [
            'float-less-than-minus-one' => Test\Util\Specification\Closure::create(static function (float $value): bool {
                return -1.0 > $value;
            }),
            'float-minus-one' => Test\Util\Specification\Identical::create(-1.0),
        ];

        $provider = FloatProvider::lessThanZero();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\FloatProvider::zero()
     */
    public function testZeroProvidesZero(float $value): void
    {
        self::assertSame(0.0, $value);
    }

    public function testZeroReturnsGeneratorThatProvidesZero(): void
    {
        $specifications = [
            'float-zero' => Test\Util\Specification\Identical::create(0.0),
        ];

        $provider = FloatProvider::zero();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\FloatProvider::greaterThanZero()
     */
    public function testGreaterThanZeroProvidesFloatGreaterThanZero(float $value): void
    {
        self::assertGreaterThan(0.0, $value);
    }

    public function testGreaterThanZeroReturnsGeneratorThatProvidesFloatGreaterThanZero(): void
    {
        $specifications = [
            'float-plus-one' => Test\Util\Specification\Identical::create(1.0),
            'float-greater-than-plus-one' => Test\Util\Specification\Closure::create(static function (float $value): bool {
                return 1.0 < $value;
            }),
        ];

        $provider = FloatProvider::greaterThanZero();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\FloatProvider::lessThanOne()
     */
    public function testLessThanOneProvidesFloatLessThanOne(float $value): void
    {
        self::assertLessThan(1, $value);
    }

    public function testLessThanOneReturnsGeneratorThatProvidesFloatLessThanOne(): void
    {
        $specifications = [
            'float-less-than-minus-one' => Test\Util\Specification\Closure::create(static function (float $value): bool {
                return -1.0 > $value;
            }),
            'float-minus-one' => Test\Util\Specification\Identical::create(-1.0),
            'float-zero' => Test\Util\Specification\Identical::create(0.0),
        ];

        $provider = FloatProvider::lessThanOne();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testOneReturnsGeneratorThatProvidesOne(): void
    {
        $specifications = [
            'float-plus-one' => Test\Util\Specification\Identical::create(1.0),
        ];

        $provider = FloatProvider::one();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    /**
     * @dataProvider \Ergebnis\DataProvider\FloatProvider::greaterThanOne()
     */
    public function testGreaterThanOneProvidesFloatGreaterThanOne(float $value): void
    {
        self::assertGreaterThan(1, $value);
    }

    public function testGreaterThanOneReturnsGeneratorThatProvidesFloatGreaterThanOne(): void
    {
        $specifications = [
            'float-greater-than-plus-one' => Test\Util\Specification\Closure::create(static function (float $value): bool {
                return 1.0 < $value;
            }),
        ];

        $provider = FloatProvider::greaterThanOne();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
