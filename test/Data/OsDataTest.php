<?php

declare(strict_types=1);

namespace DotTest\UserAgentSniffer\Data;

use Dot\UserAgentSniffer\Data\OsData;
use Laminas\Stdlib\ArraySerializableInterface;
use PHPUnit\Framework\TestCase;

class OsDataTest extends TestCase
{
    public function setUp(): void
    {
        $this->subject = new OsData();
    }

    public function testObjectImplementsArraySerializable(): void
    {
        $this->assertInstanceOf(ArraySerializableInterface::class, $this->subject);
    }

    public function testSettersReturnsSelfInstance(): void
    {
        $this->assertInstanceOf(OsData::class, $this->subject->setName('name'));
        $this->assertInstanceOf(OsData::class, $this->subject->setShortName('short_name'));
        $this->assertInstanceOf(OsData::class, $this->subject->setVersion('version'));
        $this->assertInstanceOf(OsData::class, $this->subject->setPlatform('platform'));
        $this->assertInstanceOf(OsData::class, $this->subject->setFamily('family'));
    }

    public function testGettersReturnsCorrectData(): void
    {
        $this->assertSame('name', $this->subject->setName('name')->getName());
        $this->assertSame('short_name', $this->subject->setShortName('short_name')->getShortName());
        $this->assertSame('version', $this->subject->setVersion('version')->getVersion());
        $this->assertSame('platform', $this->subject->setPlatform('platform')->getPlatform());
        $this->assertSame('family', $this->subject->setFamily('family')->getFamily());
    }

    public function testExchangeArray(): void
    {
        $this->subject->exchangeArray([
            'name'       => 'name',
            'short_name' => 'short_name',
            'version'    => 'version',
            'platform'   => 'platform',
            'family'     => 'family',
        ]);

        $this->assertSame('name', $this->subject->getName());
        $this->assertSame('short_name', $this->subject->getShortName());
        $this->assertSame('version', $this->subject->getVersion());
        $this->assertSame('platform', $this->subject->getPlatform());
        $this->assertSame('family', $this->subject->getFamily());
    }

    public function testGetArrayCopy(): void
    {
        $this->subject
            ->setName('name')
            ->setShortName('short_name')
            ->setVersion('version')
            ->setPlatform('platform')
            ->setFamily('family');

        $data = $this->subject->getArrayCopy();

        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('shortName', $data);
        $this->assertArrayHasKey('version', $data);
        $this->assertArrayHasKey('platform', $data);
        $this->assertArrayHasKey('family', $data);

        $this->assertSame('name', $data['name']);
        $this->assertSame('short_name', $data['shortName']);
        $this->assertSame('version', $data['version']);
        $this->assertSame('platform', $data['platform']);
        $this->assertSame('family', $data['family']);
    }
}
