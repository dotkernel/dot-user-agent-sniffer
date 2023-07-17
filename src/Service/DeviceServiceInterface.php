<?php

/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Service;

use Dot\UserAgentSniffer\Data\DeviceData;

/**
 * Interface DeviceServiceInterface
 */
interface DeviceServiceInterface
{
    public function getDetails(string $userAgent): DeviceData;
}
