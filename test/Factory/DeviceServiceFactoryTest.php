<?php

declare(strict_types=1);

namespace DotTest\UserAgentSniffer\Factory;

use Dot\UserAgentSniffer\Factory\DeviceServiceFactory;
use Dot\UserAgentSniffer\Service\DeviceService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class DeviceServiceFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCreateService(): void
    {
        $container = $this->createMock(ContainerInterface::class);

        $service = (new DeviceServiceFactory())($container);
        $this->assertInstanceOf(DeviceService::class, $service);
    }
}
