<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Aggregate inbound and outbound network statistics grouped by period
 */
class ServerNetworkStats extends JsonSerializableType
{
    /**
     * @var ServerNetworkStatsStats $stats
     */
    #[JsonProperty('stats')]
    public ServerNetworkStatsStats $stats;

    /**
     * @param array{
     *   stats: ServerNetworkStatsStats,
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
