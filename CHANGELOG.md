# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`3.1.0...main`][3.1.0...main].

### Added

- Added support for PHP 8.0 ([#324]), by [@localheinz]
- Added support for PHP 7.4 ([#325]), by [@localheinz]

## [`3.1.0`][3.1.0]

For a full diff see [`3.0.0...3.1.0`][3.0.0...3.1.0].

### Added

- Added support for PHP 8.3 ([#315]), by [@localheinz]

## [`3.0.0`][3.0.0]

For a full diff see [`2.0.0...3.0.0`][2.0.0...3.0.0].

### Removed

- Removed `StringProvider::uuid()` ([#244]), by [@localheinz]

## [`2.0.0`][2.0.0]

For a full diff see [`1.3.0...2.0.0`][1.3.0...2.0.0].

### Added

- Added `UuidProvider` ([#230]), by [@localheinz]

### Changed

- Dropped support for PHP 8.0 ([#226]), by [@localheinz]

### Removed

- Removed `StringProvider::uuid()` ([#230]), by [@localheinz]

## [`1.3.0`][1.3.0]

For a full diff see [`1.2.0...1.3.0`][1.2.0...1.3.0].

### Changed

- Dropped support for PHP 7.4 ([#119]), by [@localheinz]

## [`1.2.0`][1.2.0]

For a full diff see [`1.1.0...1.2.0`][1.1.0...1.2.0].

### Added

- Added `StringProvider::uuid()` ([#40]), by [@localheinz]

## [`1.1.0`][1.1.0]

For a full diff see [`1.0.0...1.1.0`][1.0.0...1.1.0].

### Changed

- Dropped support for PHP 7.3 ([#21]), by [@localheinz]
- Started using `PHP_FLOAT_EPSILON` instead of `0.1` in `FloatProvider` ([#23]), by [@localheinz]

## [`1.0.0`][1.0.0]

For a full diff see [`a5f2657...1.0.0`][a5f2657...1.0.0].

### Added

- Imported data providers from [`ergebnis/test-util`](https://github.com/ergebnis/test-util) ([#1]), by [@localheinz]

[1.0.0]: https://github.com/ergebnis/data-provider/releases/tag/1.0.0
[1.1.0]: https://github.com/ergebnis/data-provider/releases/tag/1.1.0
[1.2.0]: https://github.com/ergebnis/data-provider/releases/tag/1.2.0
[1.3.0]: https://github.com/ergebnis/data-provider/releases/tag/1.3.0
[2.0.0]: https://github.com/ergebnis/data-provider/releases/tag/2.0.0
[3.0.0]: https://github.com/ergebnis/data-provider/releases/tag/3.0.0
[3.1.0]: https://github.com/ergebnis/data-provider/releases/tag/3.1.0

[a5f2657...1.0.0]: https://github.com/ergebnis/data-provider/compare/a5f2657...1.0.0
[1.0.0...1.1.0]: https://github.com/ergebnis/data-provider/compare/1.0.0...1.1.0
[1.1.0...1.2.0]: https://github.com/ergebnis/data-provider/compare/1.1.0...1.2.0
[1.2.0...1.3.0]: https://github.com/ergebnis/data-provider/compare/1.2.0...1.3.0
[1.3.0...2.0.0]: https://github.com/ergebnis/data-provider/compare/1.3.0...2.0.0
[2.0.0...3.0.0]: https://github.com/ergebnis/data-provider/compare/2.0.0...3.0.0
[3.0.0...3.1.0]: https://github.com/ergebnis/data-provider/compare/3.0.0...3.1.0
[3.1.0...main]: https://github.com/ergebnis/data-provider/compare/3.1.0...main

[#1]: https://github.com/ergebnis/data-provider/pull/1
[#21]: https://github.com/ergebnis/data-provider/pull/21
[#40]: https://github.com/ergebnis/data-provider/pull/40
[#119]: https://github.com/ergebnis/data-provider/pull/119
[#226]: https://github.com/ergebnis/data-provider/pull/226
[#230]: https://github.com/ergebnis/data-provider/pull/230
[#244]: https://github.com/ergebnis/data-provider/pull/244
[#315]: https://github.com/ergebnis/data-provider/pull/315
[#324]: https://github.com/ergebnis/data-provider/pull/324
[#325]: https://github.com/ergebnis/data-provider/pull/325

[@localheinz]: https://github.com/localheinz
