<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Host CPU and memory statistics.
 */
class HostStats extends JsonSerializableType
{
    /**
     * @var array<HostStatsStatItem> $stat CPU idle and free memory measurements for the host.
     */
    #[JsonProperty('stat'), ArrayType([HostStatsStatItem::class])]
    public array $stat;

    /**
     * @param array{
     *   stat: array<HostStatsStatItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stat = $values['stat'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
