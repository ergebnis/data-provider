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

namespace Ergebnis\DataProvider\Test\Unit\Exception;

use Ergebnis\DataProvider\Exception;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\DataProvider\Exception\ResourceCanNotBeOpened
 */
final class ResourceCanNotBeOpenedTest extends Framework\TestCase
{
    public function testAtReturnsResourceCanNotBeOpened(): void
    {
        $path = __FILE__;

        $exception = Exception\ResourceCanNotBeOpened::at($path);

        $message = \sprintf(
            'Resource at "%s" can not be opened.',
            $path,
        );

        self::assertSame($message, $exception->getMessage());
    }
}
