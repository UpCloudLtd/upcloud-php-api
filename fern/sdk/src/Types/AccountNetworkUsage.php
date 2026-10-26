<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Account network usage and Fair Transfer Policy quota statistics.
 */
class AccountNetworkUsage extends JsonSerializableType
{
    /**
     * @var AccountNetworkUsageStats $stats
     */
    #[JsonProperty('stats')]
    public AccountNetworkUsageStats $stats;

    /**
     * @param array{
     *   stats: AccountNetworkUsageStats,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stats = $values['stats'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
