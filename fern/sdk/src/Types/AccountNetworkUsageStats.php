<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountNetworkUsageStats extends JsonSerializableType
{
    /**
     * @var array<AccountNetworkUsageStatsStatItem> $stat
     */
    #[JsonProperty('stat'), ArrayType([AccountNetworkUsageStatsStatItem::class])]
    public array $stat;

    /**
     * @param array{
     *   stat: array<AccountNetworkUsageStatsStatItem>,
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
