<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2021 Apidemia (https://www.apidemia.com)
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
    protected ?string $name = null;
    protected ?string $shortName = null;
    protected ?string $version = null;
    protected ?string $platform = null;
    protected ?string $family = null;

    /**
     * OsData constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    /**
     * @param string|null $shortName
     * @return $this
     */
    public function setShortName(?string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     * @return $this
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    /**
     * @param string|null $platform
     * @return $this
     */
    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFamily(): ?string
    {
        return $this->family;
    }

    /**
     * @param string|null $family
     * @return $this
     */
    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function exchangeArray(?array $data): self
    {
        return $this
            ->setName($data['name'] ?? null)
            ->setShortName($data['short_name'] ?? null)
            ->setVersion($data['version'] ?? null)
            ->setPlatform($data['platform'] ?? null)
            ->setFamily($data['family'] ?? null);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'name' => $this->getName(),
            'shortName' => $this->getShortName(),
            'version' => $this->getVersion(),
            'platform' => $this->getPlatform(),
            'family' => $this->getFamily()
        ];
    }
}
