<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2019 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user-agent-sniffer/blob/master/LICENSE MIT License
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Data;

use Laminas\Stdlib\ArraySerializableInterface;

/**
 * Class OsData
 * @package Dot\UserAgentSniffer\Data
 */
class OsData implements ArraySerializableInterface
{
    /** @var string $name */
    protected $name;

    /** @var string $version */
    protected $version;

    /** @var string $platform */
    protected $platform;

    /**
     * OsData constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return OsData
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return OsData
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return OsData
     */
    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * @param array $data
     * @return OsData
     */
    public function exchangeArray(array $data): self
    {
        return $this
            ->setName($data['name'])
            ->setVersion($data['version'])
            ->setPlatform($data['platform']);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'name' => $this->getName(),
            'version' => $this->getVersion(),
            'platform' => $this->getPlatform()
        ];
    }
}
