<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class DatabaseServicePlanResponseZones extends JsonSerializableType
{
    /**
     * @var ?array<DatabaseZoneInfoResponse> $zone
     */
    #[JsonProperty('zone'), ArrayType([DatabaseZoneInfoResponse::class])]
    public ?array $zone;

    /**
     * @param array{
     *   zone?: ?array<DatabaseZoneInfoResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->zone = $values['zone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
