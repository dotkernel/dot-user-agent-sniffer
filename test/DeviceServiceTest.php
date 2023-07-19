<?php

declare(strict_types=1);

namespace DotTest\UserAgentSniffer;

use DeviceDetector\DeviceDetector;
use Dot\UserAgentSniffer\Data\DeviceData;
use Dot\UserAgentSniffer\Service\DeviceService;
use PHPUnit\Framework\TestCase;

class DeviceServiceTest extends TestCase
{
    private const TYPE_SMARTPHONE = 'smartphone';
    private const TYPE_BROWSER    = 'browser';

    private DeviceService $subject;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetDetailsReturnsDeviceData()
    {
        $userAgent = 'fake user agent';

        $deviceDetectorMock = $this->createMock(DeviceDetector::class);
        $deviceDataMock     = $this->createMock(DeviceData::class);

        $deviceDataMock->method('getType')->willReturn('smartphone');
        $deviceDataMock->method('isMobile')->willReturn(true);
        $deviceDataMock->method('isBot')->willReturn(false);

        $this->subject = new DeviceService($deviceDetectorMock, $deviceDataMock);

        $data = $this->subject->getDetails($userAgent);

        $this->assertInstanceOf(DeviceData::class, $data);
        $this->assertSame(self::TYPE_SMARTPHONE, $data->getType());
        $this->assertFalse($data->isBot());
        $this->assertTrue($data->isMobile());
    }

    public function testInvalidUserAgent()
    {
        $userAgent     = 'invalid user agent';
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
        $userAgent     = 'Mozilla/5.0 (platform; rv:geckoversion) Gecko/geckotrail Firefox/firefoxversion';
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
        $userAgent     = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
        $this->subject = new DeviceService(new DeviceDetector(), new DeviceData());

        $data = $this->subject->getDetails($userAgent);

        $this->assertTrue($data->isBot());
    }
}
