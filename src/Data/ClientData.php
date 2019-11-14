<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2019 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user-agent-sniffer/blob/master/LICENSE MIT License
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Data;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class ClientData
 * @package Dot\UserAgentSniffer\Data
 */
class ClientData implements ArraySerializableInterface
{
    /** @var string $type */
    protected $type;

    /** @var string $name */
    protected $name;

    /** @var string $engine */
    protected $engine;

    /** @var string $version */
    protected $version;

    /**
     * ClientData constructor.
     */
    public function __construct()
    {
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
     * @return ClientData
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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
     * @return ClientData
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEngine(): string
    {
        return $this->engine;
    }

    /**
     * @param string $engine
     * @return ClientData
     */
    public function setEngine(string $engine): self
    {
        $this->engine = $engine;

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
     * @return ClientData
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @param array $data
     * @return ClientData
     */
    public function exchangeArray(?array $data): self
    {
        return $this
            ->setType($data['type'])
            ->setName($data['name'])
            ->setEngine($data['engine'])
            ->setVersion($data['version']);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'type' => $this->getType(),
            'name' => $this->getName(),
            'engine' => $this->getEngine(),
            'version' => $this->getVersion()
        ];
    }
}
