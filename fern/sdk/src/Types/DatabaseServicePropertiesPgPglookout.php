<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * System-wide settings for pglookout.
 */
class DatabaseServicePropertiesPgPglookout extends JsonSerializableType
{
    /**
     * @var ?int $maxFailoverReplicationTimeLag Number of seconds of master unavailability before triggering database failover to standby
     */
    #[JsonProperty('max_failover_replication_time_lag')]
    public ?int $maxFailoverReplicationTimeLag;

    /**
     * @param array{
     *   maxFailoverReplicationTimeLag?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->maxFailoverReplicationTimeLag = $values['maxFailoverReplicationTimeLag'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
