<?php

/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Service;

use DeviceDetector\DeviceDetector;
use Dot\UserAgentSniffer\Data\DeviceData;

class DeviceService implements DeviceServiceInterface
{
    protected DeviceDetector $deviceDetector;

    protected DeviceData $deviceData;

    /**
     * @Inject({DeviceService::class})
     */
    public function __construct(DeviceDetector $deviceDetector, DeviceData $deviceData)
    {
        $this->deviceDetector = $deviceDetector;
        $this->deviceData     = $deviceData;
    }

    public function getDetails(string $userAgent): DeviceData
    {
        $this->deviceDetector->setUserAgent($userAgent);
        $this->deviceDetector->parse();

        $type = $this->deviceDetector->getDeviceName();
        $brand = $this->deviceDetector->getBrandName();
        $model = $this->deviceDetector->getModel();

        $this->deviceData
            ->setType(empty($type) ? null : $type)
            ->setBrand(empty($brand) ? null : $brand)
            ->setModel(empty($model) ? null : $model)
            ->setIsBot($this->deviceDetector->isBot())
            ->setIsMobile($this->deviceDetector->isMobile());
        $this->deviceData->getClient()->exchangeArray($this->deviceDetector->getClient());
        $this->deviceData->getOs()->exchangeArray($this->deviceDetector->getOs());

        return $this->deviceData;
    }
}
