# SP Express SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)

The **SP Express SDK** makes it easy for developers to access [sp.express API](https://sp.express) .

Jump To:
* [Getting Started](#Getting-Started)
* [Quick Examples](#Quick-Examples)
* [Getting Help](#Getting-Help)
* [Contributing](#Contributing)

## Getting Started

1. **Sign up** – Before you begin, you need to get login and API token from your salesman. C  
2. **Minimum requirements** – To run the SDK, your system will need to meet the
   [minimum requirements][docs-requirements], including having **PHP >= 7.3**.
   We highly recommend having it compiled with the cURL extension and cURL
   7.16.2+ compiled with a TLS backend (e.g., NSS or OpenSSL).
3. **Install the SDK** – Using [Composer] is the recommended way to install the
   SP Express SDK for PHP: 
   ```
   composer require sp-express/php-sdk
   ```

## Quick Examples

### Create a client

```php
<?php
// Require the Composer autoloader.
require 'vendor/autoload.php';

use SpExpress\Sdk\Client\ApiClient;

// Instantiate an SP Express  
$client = new ApiClient('login', 'api_key');
```

### Create a pre-routing 

```php
<?php

use SpExpress\Sdk\Exceptions\ApiException;
use SpExpress\Sdk\Objects\Input\AddressObj;
use SpExpress\Sdk\Objects\Input\CustomsDutyObj;
use SpExpress\Sdk\Objects\Input\Options2Obj;
use SpExpress\Sdk\Objects\Input\OptionsPreRoutingObj;
use SpExpress\Sdk\Objects\Input\PackageObj;

try {
    $package = new PackageObj();
    $package->weight = 1;
    $package->size_d = 10;
    $package->size_l = 30;
    $package->size_w = 25;
    $package->value = 10;
    $package->value_currency = "PLN";
    $package->content = 'Books';
   
    $sender = new AddressObj();
    $sender->name = 'Anna Nowak';
    $sender->country = 'PL';
    $sender->email = 'anna.nowak@example.pl';
    $sender->city = 'Warszawa';
    $sender->address_line_1 = 'Krakowska 12/34';
    $sender->tel = '987654321';
    $sender->zip_code = '00-111';
   
    $receiver = new AddressObj();
    $receiver->company = 'ABC Corporation';
    $receiver->country = 'PL';
    $receiver->email = 'delivery@example.pl';
    $receiver->city = 'Kraków';
    $receiver->address_line_1 = 'Długa 5/55';
    $receiver->tel = '111222333';
    $receiver->zip_code = '12-345';
   
    $options = new OptionsPreRoutingObj();
    $options2 = new Options2Obj();
    $customsDuty = new CustomsDutyObj();


    $result = $client
        ->courierPreRouting()
        ->create($package, $sender, $receiver, $options, $options2, $customsDuty);

    $numberOfPackages = $result->getNumber(); // number of packages
    $packages = $result->getPackages(); // array with packages

    foreach ($packages as $package) {
        var_dump($package->getLabels()); // array with labels (one package can contain multiple labels)
        var_dump($package->getPackageId()); // package Id
    }
} catch (ApiException $exception) {
    // exception message contains general information
    var_dump($exception->getMessage());

    // for more detailed information
    var_dump($exception->getError()->getErrorCode());
    var_dump($exception->getError()->getDescription());
    var_dump($exception->getError()->getDetails());
}
```



## Getting Help

Bug reports and feature requests can be submitted on the [Github Issue Tracker][sdk-issues].
Feel free to open an issue on every question you have.


## Contributing

We work hard to provide a high-quality and useful SDK, and we greatly value feedback and contributions from our community.

## License

**sp-express/php-sdk** is released under the MIT License. See the bundled LICENSE.md for details.

[ico-version]: https://img.shields.io/packagist/v/sp-express/php-sdk.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/sp-express/php-sdk
[sdk-issues]: https://github.com/sp-express/php-sdk/issues
[composer]: http://getcomposer.org

