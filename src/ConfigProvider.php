<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2019 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user-agent-sniffer/blob/master/LICENSE MIT License
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer;

use Dot\UserAgentSniffer\Factory\DeviceServiceFactory;
use Dot\UserAgentSniffer\Service\DeviceService;
use Dot\UserAgentSniffer\Service\DeviceServiceInterface;

/**
 * Class ConfigProvider
 * @package Dot\UserAgentSniffer
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies()
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'factories' => [
                DeviceService::class => DeviceServiceFactory::class
            ],
            'aliases' => [
                DeviceServiceInterface::class => DeviceService::class
            ]
        ];
    }
}
