# Sp Express PHP SDK  

This is the official PHP SDK for the SP Express API. It provides a convenient way to interact with the API using PHP.

![SP Express](./sp-ex-bl.png)

API is a REST-like interface allowing creating new orders as well as getting tracking information.

## Getting Started

1. **Sign up** – Before you begin, you need to obtain a login and API key from your salesman. Contact can be found in [your panel](https://sp.express/panel)
2. **Minimum requirements** – To run the SDK, your system needs to have **PHP 8.1 or higher** with the cURL extension installed.
3. **Install the SDK** – Using Composer is the recommended way to install the
   SP Express SDK for PHP:
   ```
   composer require sp-express/php-sdk
   ```
   
## Authentication

Every request needs to be authenticated using HTTP Basic authentication, where username is your account’s login, and password is API token, which can be obtained from your account manager.


```php
<?php

use SpExpress\Sdk\Client\ApiClient;

$client = new ApiClient('username', 'password');

```
## Limitations

Currently API is limited to 60 request per minute for each user.


## Courier 

Services for creating courier items.
Creation of new courier items.

[Statuses](statuses.md)

