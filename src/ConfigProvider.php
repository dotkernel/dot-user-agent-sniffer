<?php

declare(strict_types=1);

namespace Dot\UserAgentSniffer;

use Dot\UserAgentSniffer\Factory\DeviceServiceFactory;
use Dot\UserAgentSniffer\Service\DeviceService;
use Dot\UserAgentSniffer\Service\DeviceServiceInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                DeviceService::class => DeviceServiceFactory::class,
            ],
            'aliases'   => [
                DeviceServiceInterface::class => DeviceService::class,
            ],
        ];
    }
}
