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
 * Class DeviceData
 * @package Dot\UserAgentSniffer\Data
 */
class DeviceData implements ArraySerializableInterface
{
    protected ?string $type = null;
    protected ?string $brand = null;
    protected ?string $model = null;
    protected ?bool $isBot = null;
    protected ?bool $isMobile = null;
    protected OsData $os;
    protected ClientData $client;

    /**
     * DeviceData constructor.
     */
    public function __construct()
    {
        $this->os = new OsData();
        $this->client = new ClientData();
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
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string|null $brand
     * @return $this
     */
    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     * @return $this
     */
    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBot(): ?bool
    {
        return $this->isBot;
    }

    /**
     * @param bool|null $isBot
     * @return $this
     */
    public function setIsBot(?bool $isBot): self
    {
        $this->isBot = $isBot;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMobile(): ?bool
    {
        return $this->isMobile;
    }

    /**
     * @param bool|null $isMobile
     * @return $this
     */
    public function setIsMobile(?bool $isMobile): self
    {
        $this->isMobile = $isMobile;

        return $this;
    }

    /**
     * @return OsData
     */
    public function getOs(): OsData
    {
        return $this->os;
    }

    /**
     * @param OsData $os
     * @return $this
     */
    public function setOs(OsData $os): self
    {
        $this->os = $os;

        return $this;
    }

    /**
     * @return ClientData
     */
    public function getClient(): ClientData
    {
        return $this->client;
    }

    /**
     * @param ClientData $client
     * @return $this
     */
    public function setClient(ClientData $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param array $data
     * @return DeviceData
     */
    public function exchangeArray(array $data): self
    {
        return $this
            ->setType($data['type'] ?? null)
            ->setBrand($data['brand'] ?? null)
            ->setModel($data['model'] ?? null)
            ->setIsBot($data['isBot'] ?? null)
            ->setIsMobile($data['isMobile'] ?? null);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'type' => $this->getType(),
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            'isMobile' => $this->isMobile(),
            'isBot' => $this->isBot(),
            'os' => $this->getOs()->getArrayCopy(),
            'client' => $this->getClient()->getArrayCopy()
        ];
    }
}
