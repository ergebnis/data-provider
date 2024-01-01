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

namespace Ergebnis\DataProvider\Test\Util\Specification;

/**
 * @psalm-immutable
 */
final class Identical implements Specification
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param mixed $value
     */
    public static function create($value): self
    {
        return new self($value);
    }

    public function isSatisfiedBy($value): bool
    {
        return $this->value === $value;
    }
}
