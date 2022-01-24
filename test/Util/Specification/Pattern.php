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

namespace Ergebnis\DataProvider\Test\Util\Specification;

final class Pattern implements Specification
{
    private string $pattern;

    private function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    public static function create(string $pattern): self
    {
        return new self($pattern);
    }

    public function isSatisfiedBy($value): bool
    {
        if (!\is_string($value)) {
            return false;
        }

        return 1 === \preg_match($this->pattern, $value);
    }
}
