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
use Ergebnis\DataProvider\BoolProvider;
use Ergebnis\DataProvider\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(AbstractProvider::class)]
#[Framework\Attributes\CoversClass(BoolProvider::class)]
final class BoolProviderTest extends AbstractProviderTestCase
{
    #[Framework\Attributes\DataProviderExternal(BoolProvider::class, 'arbitrary')]
    public function testArbitraryProvidesBool(mixed $value): void
    {
        self::assertIsBool($value);
    }

    public function testArbitraryReturnsGeneratorThatProvidesBoolValues(): void
    {
        $specifications = [
            'bool-false' => Test\Util\Specification\Identical::create(false),
            'bool-true' => Test\Util\Specification\Identical::create(true),
        ];

        $provider = BoolProvider::arbitrary();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    #[Framework\Attributes\DataProviderExternal(BoolProvider::class, 'false')]
    public function testFalseProvidesFalse(mixed $value): void
    {
        self::assertFalse($value);
    }

    public function testFalseReturnsGeneratorThatProvidesFalse(): void
    {
        $specifications = [
            'bool-false' => Test\Util\Specification\Identical::create(false),
        ];

        $provider = BoolProvider::false();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    #[Framework\Attributes\DataProviderExternal(BoolProvider::class, 'true')]
    public function testTrueProvidesTrue(mixed $value): void
    {
        self::assertTrue($value);
    }

    public function testTrueReturnsGeneratorThatProvidesTrue(): void
    {
        $specifications = [
            'bool-true' => Test\Util\Specification\Identical::create(true),
        ];

        $provider = BoolProvider::true();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
