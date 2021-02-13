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
 * Class DeviceData
 * @package Dot\UserAgentSniffer\Data
 */
class DeviceData implements ArraySerializableInterface
{
    /** @var string $type */
    protected $type;

    /** @var string $brand */
    protected $brand;

    /** @var string $model */
    protected $model;

    /** @var bool $isBot */
    protected $isBot;

    /** @var bool $isMobile */
    protected $isMobile;

    /** @var OsData $os */
    protected $os;

    /** @var ClientData $client */
    protected $client;

    /**
     * DeviceData constructor.
     */
    public function __construct()
    {
        $this->os = new OsData();
        $this->client = new ClientData();
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return DeviceData
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return DeviceData
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return DeviceData
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     * @return DeviceData
     */
    public function setIsBot(bool $isBot): self
    {
        $this->isBot = $isBot;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMobile(): bool
    {
        return $this->isMobile;
    }

    /**
     * @param bool $isMobile
     * @return DeviceData
     */
    public function setIsMobile(bool $isMobile): self
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
     * @return DeviceData
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
     * @return DeviceData
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
            ->setType($data['type'])
            ->setBrand($data['brand'])
            ->setModel($data['model'])
            ->setIsBot($data['isBot'])
            ->setIsMobile($data['isMobile']);
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
