# Permalink

[![Latest Stable Version](https://img.shields.io/packagist/v/magroski/permalink.svg?style=flat)](https://packagist.org/packages/magroski/permalink)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat)](https://php.net/)
[![CircleCI](https://circleci.com/gh/magroski/permalink.svg?style=shield)](https://circleci.com/gh/magroski/permalink)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/magroski/permalink/blob/master/LICENSE)

A library to create url friendly slugs

## Usage examples

```php
$text = 'my post title';
$permalink = Permalink::create($text); # my-post-title

$text = 'created';
$prefix = 'i-';
$suffix = '-this'
$permalink = Permalink::create($text, $prefix, $suffix); # i-created-this
```
