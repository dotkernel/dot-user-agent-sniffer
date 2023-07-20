<?php

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Data;

use Laminas\Stdlib\ArraySerializableInterface;

class DeviceData implements ArraySerializableInterface
{
    protected ?string $type   = null;
    protected ?string $brand  = null;
    protected ?string $model  = null;
    protected ?bool $isBot    = null;
    protected ?bool $isMobile = null;
    protected OsData $os;
    protected ClientData $client;

    public function __construct()
    {
        $this->os     = new OsData();
        $this->client = new ClientData();
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function isBot(): ?bool
    {
        return $this->isBot;
    }

    public function setIsBot(?bool $isBot): self
    {
        $this->isBot = $isBot;

        return $this;
    }

    public function isMobile(): ?bool
    {
        return $this->isMobile;
    }

    public function setIsMobile(?bool $isMobile): self
    {
        $this->isMobile = $isMobile;

        return $this;
    }

    public function getOs(): OsData
    {
        return $this->os;
    }

    public function setOs(OsData $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function getClient(): ClientData
    {
        return $this->client;
    }

    public function setClient(ClientData $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function exchangeArray(array $array): void
    {
        $this
            ->setType($array['type'] ?? null)
            ->setBrand($array['brand'] ?? null)
            ->setModel($array['model'] ?? null)
            ->setIsBot($array['isBot'] ?? null)
            ->setIsMobile($array['isMobile'] ?? null);
    }

    public function getArrayCopy(): array
    {
        return [
            'type'     => $this->getType(),
            'brand'    => $this->getBrand(),
            'model'    => $this->getModel(),
            'isMobile' => $this->isMobile(),
            'isBot'    => $this->isBot(),
            'os'       => $this->getOs()->getArrayCopy(),
            'client'   => $this->getClient()->getArrayCopy(),
        ];
    }
}
