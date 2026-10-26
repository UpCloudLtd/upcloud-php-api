<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * CPU usage statistics grouped by period
 */
class ServerCpuStats extends JsonSerializableType
{
    /**
     * @var ServerCpuStatsStats $stats
     */
    #[JsonProperty('stats')]
    public ServerCpuStatsStats $stats;

    /**
     * @param array{
     *   stats: ServerCpuStatsStats,
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
