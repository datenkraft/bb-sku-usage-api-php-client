# Backbone - SKU Usage API PHP Client

## Introduction

The SKU Usage API PHP Client enables you to work with the SKU Usage API.  

This PHP package is generated by an API client generator.

## Prerequisites

- PHP 7.2 or later for production

## Installation

You can use [Composer](https://getcomposer.org/). Follow the [installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have composer installed.

~~~~ bash
composer require datenkraft/bb-sku-usage-api-php-client
~~~~

In your PHP script, make sure you include the autoloader:

~~~~ php
require __DIR__ . '/vendor/autoload.php';
~~~~

## Using the library

## Generating the Models, Endpoints and Normalizers
1. Copy openapi.json to the project root folder
2. Check the Jane Php configuration file, should look like this

~~~~ bash
return [
    'openapi-file' => __DIR__ . '/openapi.json',
    'namespace' => 'Datenkraft\Backbone\Client\SkuUsageApi\Generated',
    'directory' => __DIR__ . '/src/generated',
    'use-fixer' => true
];
~~~~
3. Run the generator from CLI
~~~~ bash
php vendor/bin/jane-openapi generate
~~~~

## Licence
This repository is available under the [MIT license](https://github.com/Adyen/adyen-php-api-library/blob/master/LICENSE).
