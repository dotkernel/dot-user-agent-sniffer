<?php
/**
 * @see https://github.com/dotkernel/dot-user-agent-sniffer for the canonical source repository
 * @copyright Copyright (c) 2021 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user-agent-sniffer/blob/master/LICENSE MIT License
 */

declare(strict_types=1);

namespace Dot\UserAgentSniffer\Service;

use Dot\UserAgentSniffer\Data\DeviceData;

/**
 * Interface DeviceServiceInterface
 * @package Dot\UserAgentSniffer\Service
 */
interface DeviceServiceInterface
{
    /**
     * @param string $userAgent
     * @return DeviceData
     */
    public function getDetails(string $userAgent): DeviceData;
}
