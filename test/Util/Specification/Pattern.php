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

namespace Ergebnis\DataProvider\Test\Util\Specification;

final class Pattern implements Specification
{
    private function __construct(private string $pattern)
    {
    }

    public static function create(string $pattern): self
    {
        return new self($pattern);
    }

    public function isSatisfiedBy(mixed $value): bool
    {
        if (!\is_string($value)) {
            return false;
        }

        return 1 === \preg_match($this->pattern, $value);
    }
}
