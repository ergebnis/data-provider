# data-provider

[![Integrate](https://github.com/ergebnis/data-provider/workflows/Integrate/badge.svg)](https://github.com/ergebnis/data-provider/actions)
[![Merge](https://github.com/ergebnis/data-provider/workflows/Merge/badge.svg)](https://github.com/ergebnis/data-provider/actions)
[![Release](https://github.com/ergebnis/data-provider/workflows/Release/badge.svg)](https://github.com/ergebnis/data-provider/actions)
[![Renew](https://github.com/ergebnis/data-provider/workflows/Renew/badge.svg)](https://github.com/ergebnis/data-provider/actions)

[![Code Coverage](https://codecov.io/gh/ergebnis/data-provider/branch/main/graph/badge.svg)](https://codecov.io/gh/ergebnis/data-provider)
[![Type Coverage](https://shepherd.dev/github/ergebnis/data-provider/coverage.svg)](https://shepherd.dev/github/ergebnis/data-provider)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/data-provider/v/stable)](https://packagist.org/packages/ergebnis/data-provider)
[![Total Downloads](https://poser.pugx.org/ergebnis/data-provider/downloads)](https://packagist.org/packages/ergebnis/data-provider)
[![Monthly Downloads](http://poser.pugx.org/ergebnis/data-provider/d/monthly)](https://packagist.org/packages/ergebnis/data-provider)

## Installation

Run

```sh
composer require --dev ergebnis/data-provider
```

## Usage

This package provides the following generic data providers:

* [`Ergebnis\DataProvider\BoolProvider`](https://github.com/ergebnis/data-provider#dataproviderboolprovider)
* [`Ergebnis\DataProvider\FloatProvider`](https://github.com/ergebnis/data-provider#dataproviderfloatprovider)
* [`Ergebnis\DataProvider\IntProvider`](https://github.com/ergebnis/data-provider#dataproviderintprovider)
* [`Ergebnis\DataProvider\NullProvider`](https://github.com/ergebnis/data-provider#dataprovidernullprovider)
* [`Ergebnis\DataProvider\ObjectProvider`](https://github.com/ergebnis/data-provider#dataproviderobjectprovider)
* [`Ergebnis\DataProvider\ResourceProvider`](https://github.com/ergebnis/data-provider#dataproviderresourceprovider)
* [`Ergebnis\DataProvider\StringProvider`](https://github.com/ergebnis/data-provider#dataproviderstringprovider)

Since it is possible to use multiple `@dataProvider` annotations for test methods, these generic data providers allow for reuse and composition of data providers:

```php
<?php

declare(strict_types=1);

namespace Example\Test;

use PHPUnit\Framework;

final class ExampleTest extends Framework\TestCase
{
    /**
     * @dataProvider \Ergebnis\DataProvider\StringProvider::blank()
     * @dataProvider \Ergebnis\DataProvider\StringProvider::empty()
     */
    public function testFromNameRejectsBlankOrEmptyStrings(string $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Value can not be an empty or blank string.');

        UserName::fromString($value);
    }
}
```

#### `DataProvider\BoolProvider`

* `arbitrary()` provides `true`, `false`
* `false()` provides `false`
* `true()` provides `true`

For examples, see [`Ergebnis\DataProvider\Test\Unit\BoolProviderTest`](test/Unit/BoolProviderTest.php).

#### `DataProvider\FloatProvider`

* `arbitrary()` provides arbitrary `float`s
* `greaterThanOne()` provides `int`s greater than `1.0`
* `greaterThanZero()` provides `int`s greater than `0.0`
* `lessThanOne()` provides `int`s less than `1.0`
* `lessThanZero()` provides `int`s less than `0.0`
* `one()` provides `1.0`
* `zero()` provides `0.0`

For examples, see [`Ergebnis\DataProvider\Test\Unit\FloatProviderTest`](test/Unit/FloatProviderTest.php).

#### `DataProvider\IntProvider`

* `arbitrary()` provides arbitrary `int`s
* `greaterThanOne()` provides `int`s greater than `1`
* `greaterThanZero()` provides `int`s greater than `0`
* `lessThanOne()` provides `int`s less than `1`
* `lessThanZero()` provides `int`s less than `0`
* `one()` provides `1`
* `zero()` provides `0`

For examples, see [`Ergebnis\DataProvider\Test\Unit\IntProviderTest`](test/Unit/IntProviderTest.php).

#### `DataProvider\NullProvider`

* `null()` provides `null`

For examples, see [`Ergebnis\DataProvider\Test\Unit\NullProviderTest`](test/Unit/NullProviderTest.php).

#### `DataProvider\ObjectProvider`

* `object()` provides an instance of `stdClass`

For examples, see [`Ergebnis\DataProvider\Test\Unit\ObjectProviderTest`](test/Unit/ObjectProviderTest.php).

#### `DataProvider\ResourceProvider`

* `resource()` provides a `resource`

For examples, see [`Ergebnis\DataProvider\Test\Unit\ResourceProviderTest`](test/Unit/ResourceProviderTest.php).

#### `DataProvider\StringProvider`

* `arbitrary()` provides arbitrary `string`s
* `blank()` provides `string`s consisting of whitespace characters only
* `empty()` provides an empty `string`
* `trimmed()` provides non-empty, non-blank `strings` without leading and trailing whitespace
* `untrimmed()` provides non-empty, non-blank `string`s with additional leading and trailing whitespace
* `uuid()` provides lower- and upper-case UUID `string`s
* `withWhitespace()` provides non-empty, non-blank, trimmed `string`s containing whitespace

For examples, see [`Ergebnis\DataProvider\Test\Unit\StringProviderTest`](test/Unit/StringProviderTest.php).

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](https://github.com/ergebnis/.github/blob/main/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.

Please have a look at [`LICENSE.md`](LICENSE.md).

## Curious what I am up to?

Follow me on [Twitter](https://twitter.com/intent/follow?screen_name=localheinz)!
