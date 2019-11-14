<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2019 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user-agent-sniffer/blob/master/LICENSE MIT License
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Service;

use DeviceDetector\DeviceDetector;
use Dot\UserAgentSniffer\Data\DeviceData;

/**
 * Class DeviceService
 * @package Dot\UserAgentSniffer\Service
 */
class DeviceService implements DeviceServiceInterface
{
    /** @var DeviceDetector $deviceDetector */
    protected $deviceDetector;

    /**
     * UserAgentSnifferService constructor.
     * @param DeviceDetector $deviceDetector
     */
    public function __construct(DeviceDetector $deviceDetector)
    {
        $this->deviceDetector = $deviceDetector;
    }

    /**
     * @param string $userAgent
     * @return DeviceData
     */
    public function getDetails(string $userAgent): DeviceData
    {
        $this->deviceDetector->setUserAgent($userAgent);
        $this->deviceDetector->parse();

        $device = new DeviceData();
        $device
            ->setType($this->deviceDetector->getDeviceName())
            ->setBrand($this->deviceDetector->getBrandName())
            ->setModel($this->deviceDetector->getModel())
            ->setIsBot($this->deviceDetector->isBot())
            ->setIsMobile($this->deviceDetector->isMobile());

        $client = $this->deviceDetector->getClient();
        if (!empty($client)) {
            $device->getClient()->exchangeArray($client);
        }

        $os = $this->deviceDetector->getOs();
        if (!empty($os)) {
            $device->getOs()->exchangeArray($os);
        }

        return $device;
    }
}
