# dot-user-agent-sniffer
DotKernel component based on [device-detector](https://github.com/matomo-org/device-detector), providing details about a device by parsing a user agent.


## Install

You can install this library by running the following command:
```bash
$ composer require dotkernel/dot-user-agent-sniffer
```

Before adding this library as a dependency to your service, you need to add `Dot\UserAgentSniffer\ConfigProvider::class,` to your application's `config/config.php` file.


## Implementation example

```php
<?php

declare(strict_types=1);

namespace Api\Example\Service;

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
     * @param string $userAgent\
     */
    public function myMethod(string $userAgent)
    {
        $details = $this->deviceService->getDetails($userAgent);
        // add logic here...
    }
}
