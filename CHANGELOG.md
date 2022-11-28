# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`1.2.0...main`][1.2.0...main].

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

[a5f2657...1.0.0]: https://github.com/ergebnis/data-provider/compare/a5f2657...1.0.0
[1.0.0...1.1.0]: https://github.com/ergebnis/data-provider/compare/1.0.0...1.1.0
[1.1.0...1.2.0]: https://github.com/ergebnis/data-provider/compare/1.1.0...1.2.0
[1.2.0...main]: https://github.com/ergebnis/data-provider/compare/1.2.0...main

[#1]: https://github.com/ergebnis/data-provider/pull/1
[#21]: https://github.com/ergebnis/data-provider/pull/21
[#40]: https://github.com/ergebnis/data-provider/pull/40
[#119]: https://github.com/ergebnis/data-provider/pull/119

[@localheinz]: https://github.com/localheinz
