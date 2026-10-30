<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Current Fair Transfer Policy usage for an account.
 */
class AccountCurrentNetworkUsage extends JsonSerializableType
{
    /**
     * @var AccountCurrentNetworkUsageStats $stats
     */
    #[JsonProperty('stats')]
    public AccountCurrentNetworkUsageStats $stats;

    /**
     * @param array{
     *   stats: AccountCurrentNetworkUsageStats,
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
