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

use Ergebnis\DataProvider;

/**
 * @covers \Ergebnis\DataProvider\AbstractProvider
 * @covers \Ergebnis\DataProvider\UuidProvider
 */
final class UuidProviderTest extends DataProvider\Test\Unit\AbstractProviderTestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\UuidProvider::arbitrary
     */
    public function testArbitraryProvidesUuids(string $value): void
    {
        self::assertMatchesRegularExpression('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/i', $value);
    }

    public function testArbitraryReturnsGeneratorThatProvidesUuidStrings(): void
    {
        $specifications = [
            'uuid-case-lower' => DataProvider\Test\Util\Specification\Pattern::create('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/'),
            'uuid-case-upper' => DataProvider\Test\Util\Specification\Pattern::create('/^[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}$/'),
        ];

        $provider = DataProvider\UuidProvider::arbitrary();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testCaseLowerReturnsGeneratorThatProvidesLowerCaseUuid(): void
    {
        $specifications = [
            'uuid-case-lower' => DataProvider\Test\Util\Specification\Pattern::create('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/'),
        ];

        $provider = DataProvider\UuidProvider::caseLower();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testCaseUpperReturnsGeneratorThatProvidesUpperCaseUuid(): void
    {
        $specifications = [
            'uuid-case-upper' => DataProvider\Test\Util\Specification\Pattern::create('/^[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}$/'),
        ];

        $provider = DataProvider\UuidProvider::caseUpper();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
