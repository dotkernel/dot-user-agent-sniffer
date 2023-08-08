<?php

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Service;

use Dot\UserAgentSniffer\Data\DeviceData;

interface DeviceServiceInterface
{
    public function getDetails(string $userAgent): DeviceData;
}
