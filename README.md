# Datenkraft APIs Library for PHP


This is the officially supported PHP library for using Datenkraft Backbone APIs.

## Integration
The library supports all APIs under the following services:

* SKU Usage API


## Prerequisites

- PHP 7.4 or later for development and production

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

### General use with API key

Set up the client as a singleton resource; you'll use it for the API calls that you make to Backbone:

~~~~ php
$client = new \datenkraft\SKUUsageApiPhpClient();

$client->setToken("YOUR TOKEN");
$client->setEnvironment(\datenkraft\Environment::TEST);
$client->setTimeout(30);

$service = new \datenkraft\Service\SkuUsageAPI($client);

$json = '{
            "skuId": "skuId",
            "quantity": 3,
            "projectId": 3,
            "usageStart": "",
            "usageEnd": "",
            "externalId": "externalId",
            "meta": {
                "amount": 1,
                "currency": "EUR,
                "description": "description",
            },
      },
}';

$params = json_decode($json, true);

$result = $service->transmitUsageData($params);
~~~~

### General use with API key for live environment
~~~~ php
$client = new \datenkraft\SKUUsageApiPhpClient();

$client->setXApiKey("YOUR API KEY");
$client->setEnvironment(\datenkraft\Environment::LIVE);
$client->setTimeout(30);
 
...
~~~~

## Licence
This repository is available under the [MIT license](https://github.com/Adyen/adyen-php-api-library/blob/master/LICENSE).
