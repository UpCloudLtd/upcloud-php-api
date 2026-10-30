<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Aggregate disk read and write statistics grouped by period
 */
class ServerDiskStats extends JsonSerializableType
{
    /**
     * @var ServerDiskStatsStats $stats
     */
    #[JsonProperty('stats')]
    public ServerDiskStatsStats $stats;

    /**
     * @param array{
     *   stats: ServerDiskStatsStats,
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
