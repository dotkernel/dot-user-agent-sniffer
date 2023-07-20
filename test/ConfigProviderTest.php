<?php

declare(strict_types=1);

namespace DotTest\UserAgentSniffer;

use Dot\UserAgentSniffer\ConfigProvider;
use Dot\UserAgentSniffer\Service\DeviceService;
use Dot\UserAgentSniffer\Service\DeviceServiceInterface;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    private array $config;

    protected function setUp(): void
    {
        $this->config = (new ConfigProvider())();
    }

    public function testHasDependencies(): void
    {
        $this->assertArrayHasKey('dependencies', $this->config);
    }

    public function testDependenciesHasFactories(): void
    {
        $this->assertArrayHasKey('factories', $this->config['dependencies']);
        $this->assertArrayHasKey(DeviceService::class, $this->config['dependencies']['factories']);
    }

    public function testDependenciesHasAliases(): void
    {
        $this->assertArrayHasKey('aliases', $this->config['dependencies']);
        $this->assertArrayHasKey(DeviceServiceInterface::class, $this->config['dependencies']['aliases']);
    }
}
