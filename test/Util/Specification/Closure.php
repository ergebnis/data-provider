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
final class Closure implements Specification
{
    private \Closure $closure;

    private function __construct(\Closure $closure)
    {
        $this->closure = static function ($value) use ($closure): bool {
            return true === $closure($value);
        };
    }

    public static function create(\Closure $closure): self
    {
        return new self($closure);
    }

    public function isSatisfiedBy($value): bool
    {
        $closure = $this->closure;

        $isSatisfiedBy = $closure($value);

        if (!\is_bool($isSatisfiedBy)) {
            throw new \RuntimeException(\sprintf(
                'Closure should return bool, got "%s" instead.',
                \is_object($value) ? \get_class($value) : \gettype($value),
            ));
        }

        return $isSatisfiedBy;
    }
}
