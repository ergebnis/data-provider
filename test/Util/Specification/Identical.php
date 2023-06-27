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

/**
 * @psalm-immutable
 */
final class Identical implements Specification
{
    private function __construct(private readonly mixed $value)
    {
    }

    public static function create(mixed $value): self
    {
        return new self($value);
    }

    public function isSatisfiedBy(mixed $value): bool
    {
        return $this->value === $value;
    }
}
