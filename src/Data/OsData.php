<?php

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Data;

use Laminas\Stdlib\ArraySerializableInterface;

class OsData implements ArraySerializableInterface
{
    protected ?string $name      = null;
    protected ?string $shortName = null;
    protected ?string $version   = null;
    protected ?string $platform  = null;
    protected ?string $family    = null;

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

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

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
            ->setName($array['name'] ?? null)
            ->setShortName($array['short_name'] ?? null)
            ->setVersion($array['version'] ?? null)
            ->setPlatform($array['platform'] ?? null)
            ->setFamily($array['family'] ?? null);
    }

    public function getArrayCopy(): array
    {
        return [
            'name'      => $this->getName(),
            'shortName' => $this->getShortName(),
            'version'   => $this->getVersion(),
            'platform'  => $this->getPlatform(),
            'family'    => $this->getFamily(),
        ];
    }
}
