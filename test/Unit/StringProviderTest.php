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

namespace Ergebnis\DataProvider\Test\Unit;

use Ergebnis\DataProvider\AbstractProvider;
use Ergebnis\DataProvider\StringProvider;
use Ergebnis\DataProvider\Test;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(AbstractProvider::class)]
#[Framework\Attributes\CoversClass(StringProvider::class)]
final class StringProviderTest extends AbstractProviderTestCase
{
    #[Framework\Attributes\DataProviderExternal(StringProvider::class, 'arbitrary')]
    public function testArbitraryProvidesString(mixed $value): void
    {
        self::assertIsString($value);
    }

    public function testArbitraryReturnsGeneratorThatProvidesArbitraryStrings(): void
    {
        $specifications = [
            'string-arbitrary-sentence' => Test\Util\Specification\Closure::create(static function (string $value): bool {
                return '' !== $value && '' !== \trim($value);
            }),
            'string-arbitrary-word' => Test\Util\Specification\Closure::create(static function (string $value): bool {
                return '' !== $value && '' !== \trim($value);
            }),
            'string-blank-carriage-return' => Test\Util\Specification\Identical::create("\r"),
            'string-blank-line-feed' => Test\Util\Specification\Identical::create("\n"),
            'string-blank-space' => Test\Util\Specification\Identical::create(' '),
            'string-blank-tab' => Test\Util\Specification\Identical::create("\t"),
            'string-empty' => Test\Util\Specification\Identical::create(''),
            'string-untrimmed-carriage-return' => Test\Util\Specification\Pattern::create('/^\r{1,5}\w+\r{1,5}$/'),
            'string-untrimmed-line-feed' => Test\Util\Specification\Pattern::create('/^\n{1,5}\w+\n{1,5}$/'),
            'string-untrimmed-space' => Test\Util\Specification\Pattern::create('/^\s{1,5}\w+\s{1,5}$/'),
            'string-untrimmed-tab' => Test\Util\Specification\Pattern::create('/^\t{1,5}\w+\t{1,5}$/'),
            'string-uuid-case-lower' => Test\Util\Specification\Pattern::create('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/'),
            'string-uuid-case-upper' => Test\Util\Specification\Pattern::create('/^[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}$/'),
            'string-with-whitespace-carriage-return' => Test\Util\Specification\Pattern::create('/^\w+(\r+\w+){1,4}$/'),
            'string-with-whitespace-line-feed' => Test\Util\Specification\Pattern::create('/^\w+(\n+\w+){1,4}$/'),
            'string-with-whitespace-space' => Test\Util\Specification\Pattern::create('/^\w+(\s+\w+){1,4}$/'),
            'string-with-whitespace-tab' => Test\Util\Specification\Pattern::create('/^\w+(\t+\w+){1,4}$/'),
        ];

        $provider = StringProvider::arbitrary();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    #[Framework\Attributes\DataProviderExternal(StringProvider::class, 'blank')]
    public function testBlankProvidesBlankString(string $value): void
    {
        self::assertSame('', \trim($value));
        self::assertNotSame('', $value);
    }

    public function testBlankReturnsGeneratorThatProvidesStringsThatAreNeitherEmptyNorBlank(): void
    {
        $specifications = [
            'string-blank-carriage-return' => Test\Util\Specification\Identical::create("\r"),
            'string-blank-line-feed' => Test\Util\Specification\Identical::create("\n"),
            'string-blank-space' => Test\Util\Specification\Identical::create(' '),
            'string-blank-tab' => Test\Util\Specification\Identical::create("\t"),
        ];

        $provider = StringProvider::blank();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    #[Framework\Attributes\DataProviderExternal(StringProvider::class, 'empty')]
    public function testEmptyProvidesEmptyString(string $value): void
    {
        self::assertSame('', $value);
    }

    public function testEmptyReturnsGeneratorThatProvidesAnEmptyString(): void
    {
        $specifications = [
            'string-empty' => Test\Util\Specification\Identical::create(''),
        ];

        $provider = StringProvider::empty();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    #[Framework\Attributes\DataProviderExternal(StringProvider::class, 'untrimmed')]
    public function testUntrimmedProvidesUntrimmedString(string $value): void
    {
        self::assertNotSame(\trim($value), $value);
        self::assertNotSame('', $value);
        self::assertNotSame('', \trim($value));
    }

    #[Framework\Attributes\DataProviderExternal(StringProvider::class, 'trimmed')]
    public function testTrimmedProvidesString(mixed $value): void
    {
        self::assertIsString($value);
    }

    public function testTrimmedReturnsGeneratorThatProvidesStringsThatAreTrimmed(): void
    {
        $specifications = [
            'string-arbitrary-sentence' => Test\Util\Specification\Closure::create(static function (string $value): bool {
                return '' !== $value && '' !== \trim($value);
            }),
            'string-arbitrary-word' => Test\Util\Specification\Closure::create(static function (string $value): bool {
                return '' !== $value && '' !== \trim($value);
            }),
            'string-uuid-case-lower' => Test\Util\Specification\Pattern::create('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/'),
            'string-uuid-case-upper' => Test\Util\Specification\Pattern::create('/^[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}$/'),
            'string-with-whitespace-carriage-return' => Test\Util\Specification\Pattern::create('/^\w+(\r+\w+){1,4}$/'),
            'string-with-whitespace-line-feed' => Test\Util\Specification\Pattern::create('/^\w+(\n+\w+){1,4}$/'),
            'string-with-whitespace-space' => Test\Util\Specification\Pattern::create('/^\w+(\s+\w+){1,4}$/'),
            'string-with-whitespace-tab' => Test\Util\Specification\Pattern::create('/^\w+(\t+\w+){1,4}$/'),
        ];

        $provider = StringProvider::trimmed();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testUntrimmedReturnsGeneratorThatProvidesUntrimmedStrings(): void
    {
        $specifications = [
            'string-untrimmed-carriage-return' => Test\Util\Specification\Pattern::create('/^\r{1,5}\w+\r{1,5}$/'),
            'string-untrimmed-line-feed' => Test\Util\Specification\Pattern::create('/^\n{1,5}\w+\n{1,5}$/'),
            'string-untrimmed-space' => Test\Util\Specification\Pattern::create('/^\s{1,5}\w+\s{1,5}$/'),
            'string-untrimmed-tab' => Test\Util\Specification\Pattern::create('/^\t{1,5}\w+\t{1,5}$/'),
        ];

        $provider = StringProvider::untrimmed();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testUuidReturnsGeneratorThatProvidesUuidStrings(): void
    {
        $specifications = [
            'string-uuid-case-lower' => Test\Util\Specification\Pattern::create('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/'),
            'string-uuid-case-upper' => Test\Util\Specification\Pattern::create('/^[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}$/'),
        ];

        $provider = StringProvider::uuid();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }

    public function testWithWhitespaceReturnsGeneratorThatProvidesTrimmedStringsWithWhitespace(): void
    {
        $specifications = [
            'string-arbitrary-sentence' => Test\Util\Specification\Closure::create(static function (string $value): bool {
                return '' !== $value && '' !== \trim($value);
            }),
            'string-with-whitespace-carriage-return' => Test\Util\Specification\Pattern::create('/^\w+(\r+\w+){1,4}$/'),
            'string-with-whitespace-line-feed' => Test\Util\Specification\Pattern::create('/^\w+(\n+\w+){1,4}$/'),
            'string-with-whitespace-space' => Test\Util\Specification\Pattern::create('/^\w+(\s+\w+){1,4}$/'),
            'string-with-whitespace-tab' => Test\Util\Specification\Pattern::create('/^\w+(\t+\w+){1,4}$/'),
        ];

        $provider = StringProvider::withWhitespace();

        self::assertProvidesDataSetsForValuesSatisfyingSpecifications($specifications, $provider);
    }
}
