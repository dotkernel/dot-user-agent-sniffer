<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2019 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user-agent-sniffer/blob/master/LICENSE MIT License
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Factory;

use DeviceDetector\DeviceDetector;
use Dot\UserAgentSniffer\Service\DeviceService;
use Psr\Container\ContainerInterface;

/**
 * Class DeviceServiceFactory
 * @package Dot\UserAgentSniffer\Factory
 */
class DeviceServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return DeviceService
     */
    public function __invoke(ContainerInterface $container): DeviceService
    {
        return new DeviceService(
            $container->get(DeviceDetector::class)
        );
    }
}
