<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class AccountCurrentNetworkUsageStats extends JsonSerializableType
{
    /**
     * @var AccountCurrentNetworkUsageStatsCurrentNetworkUsage $currentNetworkUsage
     */
    #[JsonProperty('current_network_usage')]
    public AccountCurrentNetworkUsageStatsCurrentNetworkUsage $currentNetworkUsage;

    /**
     * @param array{
     *   currentNetworkUsage: AccountCurrentNetworkUsageStatsCurrentNetworkUsage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currentNetworkUsage = $values['currentNetworkUsage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
