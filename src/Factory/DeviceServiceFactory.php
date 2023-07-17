<?php

/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Factory;

use DeviceDetector\DeviceDetector;
use Dot\UserAgentSniffer\Data\DeviceData;
use Dot\UserAgentSniffer\Service\DeviceService;
use Psr\Container\ContainerInterface;

class DeviceServiceFactory
{
    public function __invoke(ContainerInterface $container): DeviceService
    {
        return new DeviceService(
            new DeviceDetector(),
            new DeviceData(),
        );
    }
}
