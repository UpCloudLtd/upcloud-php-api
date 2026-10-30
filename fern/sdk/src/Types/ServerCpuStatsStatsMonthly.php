<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerCpuStatsStatsMonthly extends JsonSerializableType
{
    /**
     * @var ServerCpuStatsSummary $summary
     */
    #[JsonProperty('summary')]
    public ServerCpuStatsSummary $summary;

    /**
     * @param array{
     *   summary: ServerCpuStatsSummary,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->summary = $values['summary'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
