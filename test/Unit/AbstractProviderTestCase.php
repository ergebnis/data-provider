<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/data-provider
 */

namespace Ergebnis\DataProvider\Test\Unit;

use Ergebnis\DataProvider\Test;
use PHPUnit\Framework;

abstract class AbstractProviderTestCase extends Framework\TestCase
{
    /**
     * @param array<string, mixed>             $values
     * @param \Generator<string, array<mixed>> $provider
     */
    final protected static function assertProvidesDataSetsForValues(array $values, \Generator $provider): void
    {
        self::assertExpectedValuesAreNotEmpty($values);

        $expectedDataSets = \array_map(static function ($value): array {
            return [
                $value,
            ];
        }, $values);

        $actualDataSets = \iterator_to_array($provider);

        self::assertDataSetsAreNotEmpty($actualDataSets);

        self::assertEquals(
            $expectedDataSets,
            $actualDataSets,
            'Failed asserting that a generator yields data sets for the expected values.',
        );
    }

    /**
     * @param array<string, Test\Util\Specification\Specification> $specifications
     * @param \Generator<string, array<mixed>>                     $provider
     */
    final protected static function assertProvidesDataSetsForValuesSatisfyingSpecifications(array $specifications, \Generator $provider): void
    {
        self::assertContainsOnly(
            'string',
            \array_keys($specifications),
            true,
            'Failed asserting that the keys of specifications are all strings.',
        );

        self::assertContainsOnly(
            Test\Util\Specification\Specification::class,
            $specifications,
            false,
            \sprintf(
                'Failed asserting that the values of specifications implement "%s".',
                Test\Util\Specification\Specification::class,
            ),
        );

        $dataSets = \iterator_to_array($provider);

        self::assertEquals(
            \array_keys($specifications),
            \array_keys($dataSets),
            'Failed asserting that the provided data has the same keys as the specifications.',
        );

        $keysForDataSetsWhereValueDoesNotSatisfySpecification = \array_filter(\array_keys($dataSets), static function (string $key) use ($dataSets, $specifications): bool {
            $specification = $specifications[$key];

            $dataSet = $dataSets[$key];

            self::assertIsArray($dataSet, \sprintf(
                'Failed asserting that the data set provided for key "%s" is an array.',
                $key,
            ));

            self::assertCount(1, $dataSet, \sprintf(
                'Failed asserting that the data set provided for key "%s" contains only one value.',
                $key,
            ));

            $value = \array_shift($dataSet);

            return !$specification->isSatisfiedBy($value);
        });

        self::assertEquals([], $keysForDataSetsWhereValueDoesNotSatisfySpecification, \sprintf(
            'Failed asserting that the value for the data sets with the keys "%s" satisfy the corresponding requirements.',
            \implode(
                '", "',
                $keysForDataSetsWhereValueDoesNotSatisfySpecification,
            ),
        ));
    }

    final protected static function assertDataSetsAreNotEmpty(array $actual): void
    {
        self::assertNotEmpty($actual, 'Failed asserting that provided data sets are not empty.');
    }

    private static function assertExpectedValuesAreNotEmpty(array $values): void
    {
        self::assertNotEmpty($values, 'Failed asserting that expected values are not empty.');
    }
}
