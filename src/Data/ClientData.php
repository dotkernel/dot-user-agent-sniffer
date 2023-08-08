<?php

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Data;

use Laminas\Stdlib\ArraySerializableInterface;

class ClientData implements ArraySerializableInterface
{
    protected ?string $type          = null;
    protected ?string $name          = null;
    protected ?string $shortName     = null;
    protected ?string $version       = null;
    protected ?string $engine        = null;
    protected ?string $engineVersion = null;
    protected ?string $family        = null;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getEngine(): ?string
    {
        return $this->engine;
    }

    public function setEngine(?string $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getEngineVersion(): ?string
    {
        return $this->engineVersion;
    }

    public function setEngineVersion(?string $engineVersion): self
    {
        $this->engineVersion = $engineVersion;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function exchangeArray(?array $array): void
    {
        $this
            ->setType($array['type'] ?? null)
            ->setName($array['name'] ?? null)
            ->setShortName($array['short_name'] ?? null)
            ->setVersion($array['version'] ?? null)
            ->setEngine($array['engine'] ?? null)
            ->setEngineVersion($array['engine_version'] ?? null)
            ->setFamily($array['family'] ?? null);
    }

    public function getArrayCopy(): array
    {
        return [
            'type'          => $this->getType(),
            'name'          => $this->getName(),
            'shortName'     => $this->getShortName(),
            'version'       => $this->getVersion(),
            'engine'        => $this->getEngine(),
            'engineVersion' => $this->getEngineVersion(),
            'family'        => $this->getFamily(),
        ];
    }
}
