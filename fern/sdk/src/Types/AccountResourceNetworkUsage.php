<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network usage statistics grouped by resource.
 */
class AccountResourceNetworkUsage extends JsonSerializableType
{
    /**
     * @var AccountResourceNetworkUsageStats $stats
     */
    #[JsonProperty('stats')]
    public AccountResourceNetworkUsageStats $stats;

    /**
     * @param array{
     *   stats: AccountResourceNetworkUsageStats,
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
