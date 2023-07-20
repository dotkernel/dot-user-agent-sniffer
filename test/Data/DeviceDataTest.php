<?php

declare(strict_types=1);

namespace DotTest\UserAgentSniffer\Data;

use Dot\UserAgentSniffer\Data\ClientData;
use Dot\UserAgentSniffer\Data\DeviceData;
use Dot\UserAgentSniffer\Data\OsData;
use Laminas\Stdlib\ArraySerializableInterface;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DeviceDataTest extends TestCase
{
    private DeviceData $subject;

    private OsData|MockObject $osData;

    private ClientData|MockObject $clientData;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->subject = new DeviceData();

        $this->osData     = $this->createMock(OsData::class);
        $this->clientData = $this->createMock(ClientData::class);
    }

    public function testObjectImplementsArraySerializable(): void
    {
        $this->assertInstanceOf(ArraySerializableInterface::class, $this->subject);
    }

    public function testSettersReturnsSelfInstance(): void
    {
        $this->assertInstanceOf(DeviceData::class, $this->subject->setType('type'));
        $this->assertInstanceOf(DeviceData::class, $this->subject->setBrand('brand'));
        $this->assertInstanceOf(DeviceData::class, $this->subject->setModel('model'));
        $this->assertInstanceOf(DeviceData::class, $this->subject->setIsBot(false));
        $this->assertInstanceOf(DeviceData::class, $this->subject->setIsMobile(false));
        $this->assertInstanceOf(DeviceData::class, $this->subject->setOs($this->osData));
        $this->assertInstanceOf(DeviceData::class, $this->subject->setClient($this->clientData));
    }

    public function testGettersReturnsCorrectData(): void
    {
        $this->assertSame('type', $this->subject->setType('type')->getType());
        $this->assertSame('brand', $this->subject->setBrand('brand')->getBrand());
        $this->assertSame('model', $this->subject->setModel('model')->getModel());
        $this->assertFalse($this->subject->setIsBot(false)->isBot());
        $this->assertFalse($this->subject->setIsMobile(false)->isMobile());
        $this->assertSame($this->osData, $this->subject->setOs($this->osData)->getOs());
        $this->assertSame($this->clientData, $this->subject->setClient($this->clientData)->getClient());
    }

    public function testExchangeArray(): void
    {
        $this->subject->exchangeArray([
            'type'     => 'type',
            'brand'    => 'brand',
            'model'    => 'model',
            'isBot'    => true,
            'isMobile' => true,
        ]);

        $this->assertSame('type', $this->subject->getType());
        $this->assertSame('brand', $this->subject->getBrand());
        $this->assertSame('model', $this->subject->getModel());
        $this->assertTrue($this->subject->isBot());
        $this->assertTrue($this->subject->isMobile());
    }

    public function testGetArrayCopy(): void
    {
        $this->subject
            ->setType('type')
            ->setBrand('brand')
            ->setModel('model')
            ->setIsBot(true)
            ->setIsMobile(true)
            ->setOs($this->osData)
            ->setClient($this->clientData);

        $data = $this->subject->getArrayCopy();

        $this->assertArrayHasKey('type', $data);
        $this->assertArrayHasKey('brand', $data);
        $this->assertArrayHasKey('model', $data);
        $this->assertArrayHasKey('isMobile', $data);
        $this->assertArrayHasKey('isBot', $data);
        $this->assertArrayHasKey('os', $data);
        $this->assertArrayHasKey('client', $data);

        $this->assertSame('type', $data['type']);
        $this->assertSame('brand', $data['brand']);
        $this->assertSame('model', $data['model']);
        $this->assertTrue($data['isMobile']);
        $this->assertTrue($data['isBot']);
        $this->assertSame($this->osData->getArrayCopy(), $data['os']);
        $this->assertSame($this->clientData->getArrayCopy(), $data['client']);
    }
}
