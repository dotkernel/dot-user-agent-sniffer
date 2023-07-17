<?php

declare(strict_types=1);

namespace Dot\tests;

use DeviceDetector\DeviceDetector;
use Dot\UserAgentSniffer\Data\DeviceData;
use Dot\UserAgentSniffer\Service\DeviceService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DeviceServiceTest extends TestCase
{
    private const TYPE_SMARTPHONE = 'smartphone';
    private const TYPE_BROWSER = 'browser';

    private DeviceService $subject;

    private DeviceDetector|MockObject $deviceDetectorMock;

    private DeviceData|MockObject $deviceDataMock;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetDetailsReturnsDeviceData()
    {
        $userAgent = 'fake user agent';

        $this->deviceDetectorMock = $this->createMock(DeviceDetector::class);
        $this->deviceDataMock     = $this->createMock(DeviceData::class);

        $this->deviceDataMock->method('getType')->willReturn('smartphone');
        $this->deviceDataMock->method('isMobile')->willReturn(true);
        $this->deviceDataMock->method('isBot')->willReturn(false);

        $this->subject = new DeviceService($this->deviceDetectorMock, $this->deviceDataMock);

        $data = $this->subject->getDetails($userAgent);

        $this->assertInstanceOf(DeviceData::class, $data);
        $this->assertSame(self::TYPE_SMARTPHONE, $data->getType());
        $this->assertFalse($data->isBot());
        $this->assertTrue($data->isMobile());
    }

    public function testInvalidUserAgent()
    {
        $userAgent = 'invalid user agent';
        $this->subject = new DeviceService(new DeviceDetector(), new DeviceData());

        $data = $this->subject->getDetails($userAgent);

        $this->assertNull($data->getType());
        $this->assertNull($data->getBrand());
        $this->assertNull($data->getModel());
        $this->assertNull($data->getOs()->getName());
        $this->assertNull($data->getOs()->getShortName());
        $this->assertNull($data->getOs()->getVersion());
        $this->assertNull($data->getOs()->getPlatform());
        $this->assertNull($data->getOs()->getFamily());
        $this->assertFalse($data->isBot());
        $this->assertFalse($data->isMobile());
    }

    public function testValidUserAgent()
    {
        $userAgent = 'Mozilla/5.0 (platform; rv:geckoversion) Gecko/geckotrail Firefox/firefoxversion';
        $this->subject = new DeviceService(new DeviceDetector(), new DeviceData());

        $data = $this->subject->getDetails($userAgent);

        $this->assertEquals(self::TYPE_BROWSER, $data->getClient()->getType());
        $this->assertEquals('Firefox', $data->getClient()->getName());
        $this->assertEquals('Firefox', $data->getClient()->getFamily());
        $this->assertFalse($data->isBot());
        $this->assertFalse($data->isMobile());
    }

    public function testBotUserAgent()
    {
        $userAgent = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
        $this->subject = new DeviceService(new DeviceDetector(), new DeviceData());

        $data = $this->subject->getDetails($userAgent);

        $this->assertTrue($data->isBot());
    }
}
