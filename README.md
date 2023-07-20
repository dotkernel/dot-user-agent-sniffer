# dot-user-agent-sniffer
DotKernel component based on [device-detector](https://github.com/matomo-org/device-detector), providing details about a device by parsing a user agent.

![OSS Lifecycle](https://img.shields.io/osslifecycle/dotkernel/dot-user-agent-sniffer)
![PHP from Packagist (specify version)](https://img.shields.io/packagist/php-v/dotkernel/dot-user-agent-sniffer/3.1.1)

[![GitHub issues](https://img.shields.io/github/issues/dotkernel/dot-user-agent-sniffer)](https://github.com/dotkernel/dot-user-agent-sniffer/issues)
[![GitHub forks](https://img.shields.io/github/forks/dotkernel/dot-user-agent-sniffer)](https://github.com/dotkernel/dot-user-agent-sniffer/network)
[![GitHub stars](https://img.shields.io/github/stars/dotkernel/dot-user-agent-sniffer)](https://github.com/dotkernel/dot-user-agent-sniffer/stargazers)
[![GitHub license](https://img.shields.io/github/license/dotkernel/dot-user-agent-sniffer)](https://github.com/dotkernel/dot-user-agent-sniffer/blob/3.0/LICENSE)

[![Build Static](https://github.com/dotkernel/dot-user-agent-sniffer/actions/workflows/static-analysis.yml/badge.svg?branch=3.0)](https://github.com/dotkernel/dot-user-agent-sniffer/actions/workflows/static-analysis.yml)

[![SymfonyInsight](https://insight.symfony.com/projects/2e87cb23-ba35-4bef-a576-f9cb3a989ee9/big.svg)](https://insight.symfony.com/projects/2e87cb23-ba35-4bef-a576-f9cb3a989ee9)

## Install

You can install this library by running the following command:
```bash
$ composer require dotkernel/dot-user-agent-sniffer
```

Before adding this library as a dependency to your service, you need to add `Dot\UserAgentSniffer\ConfigProvider::class,` to your application's `config/config.php` file.


## Usage example

```php
<?php

declare(strict_types=1);

namespace Api\Example\Service;

use Dot\UserAgentSniffer\Data\DeviceData;
use Dot\UserAgentSniffer\Service\DeviceServiceInterface;

/**
 * Class MyService
 * @package Api\Example\Service
 */
class MyService
{
    /** @var DeviceServiceInterface $deviceService */
    protected $deviceService;

    /**
     * MyService constructor.
     * @param DeviceServiceInterface $deviceService
     */
    public function __construct(DeviceServiceInterface $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * @param string $userAgent
     * @return DeviceData
     */
    public function myMethod(string $userAgent)
    {
        return $this->deviceService->getDetails($userAgent);
    }
}
```


When called with an `$userAgent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/78.0.3904.84 Mobile/15E148 Safari/604.1'`, `myMethod($userAgent)` returns an object with the following structure:

```php
Dot\UserAgentSniffer\Data\DeviceData::__set_state(array(
    'type' => 'smartphone',
    'brand' => 'Apple',
    'model' => 'iPhone',
    'isBot' => false,
    'isMobile' => true,
    'os' =>
      Dot\UserAgentSniffer\Data\OsData::__set_state(array(
        'name' => 'iOS',
        'version' => '13.2',
        'platform' => '',
    )),
    'client' =>
      Dot\UserAgentSniffer\Data\ClientData::__set_state(array(
        'type' => 'browser',
        'name' => 'Chrome Mobile iOS',
        'engine' => 'WebKit',
        'version' => '78.0',
    )),
))
```

The above call can also be chained as `myMethod($userAgent)->getArrayCopy()`, to retrieve the details as an array:

```php
array (
    'type' => 'smartphone',
    'brand' => 'Apple',
    'model' => 'iPhone',
    'isMobile' => true,
    'isBot' => false,
    'os' =>
      array (
        'name' => 'iOS',
        'version' => '13.2',
        'platform' => '',
    ),
    'client' =>
      array (
        'type' => 'browser',
        'name' => 'Chrome Mobile iOS',
        'engine' => 'WebKit',
        'version' => '78.0',
    ),
)
```
