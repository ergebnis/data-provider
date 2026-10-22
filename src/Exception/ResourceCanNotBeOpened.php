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

namespace Ergebnis\DataProvider\Exception;

final class ResourceCanNotBeOpened extends \RuntimeException
{
    public static function at(string $path): self
    {
        return new self(\sprintf(
            'Resource at "%s" can not be opened.',
            $path,
        ));
    }
}
