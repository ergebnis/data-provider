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

namespace Ergebnis\DataProvider\Test\Unit\Exception;

use Ergebnis\DataProvider\Exception;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\DataProvider\Exception\EmptyValues
 */
final class EmptyValuesTest extends Framework\TestCase
{
    public function testCreateReturnsException(): void
    {
        $exception = Exception\EmptyValues::create();

        self::assertSame('Values can not be empty.', $exception->getMessage());
    }

    public function testFilteredReturnsException(): void
    {
        $exception = Exception\EmptyValues::filtered();

        self::assertSame('Filtered values can not be empty.', $exception->getMessage());
    }
}
