<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountResourceNetworkUsageStats extends JsonSerializableType
{
    /**
     * @var array<AccountResourceNetworkUsageStatsStatItem> $stat
     */
    #[JsonProperty('stat'), ArrayType([AccountResourceNetworkUsageStatsStatItem::class])]
    public array $stat;

    /**
     * @param array{
     *   stat: array<AccountResourceNetworkUsageStatsStatItem>,
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
