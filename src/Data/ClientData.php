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
 * Class ClientData
 * @package Dot\UserAgentSniffer\Data
 */
class ClientData implements ArraySerializableInterface
{
    protected ?string $type = null;
    protected ?string $name = null;
    protected ?string $shortName = null;
    protected ?string $version = null;
    protected ?string $engine = null;
    protected ?string $engineVersion = null;
    protected ?string $family = null;

    /**
     * ClientData constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
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
    public function getEngine(): ?string
    {
        return $this->engine;
    }

    /**
     * @param string|null $engine
     * @return $this
     */
    public function setEngine(?string $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEngineVersion(): ?string
    {
        return $this->engineVersion;
    }

    /**
     * @param string|null $engineVersion
     * @return $this
     */
    public function setEngineVersion(?string $engineVersion): self
    {
        $this->engineVersion = $engineVersion;

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
     * @param array $data
     * @return ClientData
     */
    public function exchangeArray(?array $data): self
    {
        return $this
            ->setType($data['type'] ?? null)
            ->setName($data['name'] ?? null)
            ->setShortName($data['short_name'] ?? null)
            ->setVersion($data['version'] ?? null)
            ->setEngine($data['engine'] ?? null)
            ->setEngineVersion($data['engine_version'] ?? null)
            ->setFamily($data['family'] ?? null);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'type' => $this->getType(),
            'name' => $this->getName(),
            'shortName' => $this->getShortName(),
            'version' => $this->getVersion(),
            'engine' => $this->getEngine(),
            'engineVersion' => $this->getEngineVersion(),
            'family' => $this->getFamily()
        ];
    }
}
