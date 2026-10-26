<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerDiskStatsStatsWeekly extends JsonSerializableType
{
    /**
     * @var ServerDiskStatsSummary $summary
     */
    #[JsonProperty('summary')]
    public ServerDiskStatsSummary $summary;

    /**
     * @param array{
     *   summary: ServerDiskStatsSummary,
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
