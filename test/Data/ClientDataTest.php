<?php

declare(strict_types=1);

namespace DotTest\UserAgentSniffer\Data;

use Dot\UserAgentSniffer\Data\ClientData;
use Laminas\Stdlib\ArraySerializableInterface;
use PHPUnit\Framework\TestCase;

class ClientDataTest extends TestCase
{
    private ClientData $subject;

    public function setUp(): void
    {
        $this->subject = new ClientData();

        parent::setUp();
    }

    public function testObjectImplementsArraySerializable(): void
    {
        $this->assertInstanceOf(ArraySerializableInterface::class, $this->subject);
    }

    public function testSettersReturnsSelfInstance(): void
    {
        $this->assertInstanceOf(ClientData::class, $this->subject->setType('type'));
        $this->assertInstanceOf(ClientData::class, $this->subject->setName('name'));
        $this->assertInstanceOf(ClientData::class, $this->subject->setShortName('short_name'));
        $this->assertInstanceOf(ClientData::class, $this->subject->setVersion('version'));
        $this->assertInstanceOf(ClientData::class, $this->subject->setEngine('engine'));
        $this->assertInstanceOf(ClientData::class, $this->subject->setEngineVersion('engine_version'));
        $this->assertInstanceOf(ClientData::class, $this->subject->setFamily('family'));
    }

    public function testGettersReturnsCorrectData(): void
    {
        $this->assertSame('type', $this->subject->setType('type')->getType());
        $this->assertSame('name', $this->subject->setName('name')->getName());
        $this->assertSame('short_name', $this->subject->setShortName('short_name')->getShortName());
        $this->assertSame('version', $this->subject->setVersion('version')->getVersion());
        $this->assertSame('engine', $this->subject->setEngine('engine')->getEngine());
        $this->assertSame('family', $this->subject->setFamily('family')->getFamily());
        $this->assertSame(
            'engine_version',
            $this->subject->setEngineVersion('engine_version')->getEngineVersion()
        );
    }

    public function testExchangeArray(): void
    {
        $this->subject->exchangeArray([
            'type'           => 'type',
            'name'           => 'name',
            'short_name'     => 'short_name',
            'version'        => 'version',
            'engine_version' => 'engine_version',
            'family'         => 'family',
        ]);

        $this->assertSame('type', $this->subject->getType());
        $this->assertSame('name', $this->subject->getName());
        $this->assertSame('short_name', $this->subject->getShortName());
        $this->assertSame('version', $this->subject->getVersion());
        $this->assertSame('engine_version', $this->subject->getEngineVersion());
        $this->assertSame('family', $this->subject->getFamily());
    }

    public function testGetArrayCopy(): void
    {
        $this->subject
            ->setType('type')
            ->setName('name')
            ->setShortName('short_name')
            ->setVersion('version')
            ->setEngine('engine')
            ->setEngineVersion('engine_version')
            ->setFamily('family');

        $data = $this->subject->getArrayCopy();

        $this->assertArrayHasKey('type', $data);
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('shortName', $data);
        $this->assertArrayHasKey('version', $data);
        $this->assertArrayHasKey('engine', $data);
        $this->assertArrayHasKey('engineVersion', $data);
        $this->assertArrayHasKey('family', $data);

        $this->assertSame('type', $data['type']);
        $this->assertSame('name', $data['name']);
        $this->assertSame('short_name', $data['shortName']);
        $this->assertSame('version', $data['version']);
        $this->assertSame('engine', $data['engine']);
        $this->assertSame('engine_version', $data['engineVersion']);
        $this->assertSame('family', $data['family']);
    }
}
