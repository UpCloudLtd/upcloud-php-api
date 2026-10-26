<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSegrep extends JsonSerializableType
{
    /**
     * @var ?int $pressureCheckpointLimit The maximum number of indexing checkpoints that a replica shard can fall behind when copying from primary. Once `segrep.pressure.checkpoint.limit` is breached along with `segrep.pressure.time.limit`, the segment replication backpressure mechanism is initiated. Default is 4 checkpoints.
     */
    #[JsonProperty('pressure.checkpoint.limit')]
    public ?int $pressureCheckpointLimit;

    /**
     * @var ?bool $pressureEnabled Enables the segment replication backpressure mechanism. Default is false.
     */
    #[JsonProperty('pressure.enabled')]
    public ?bool $pressureEnabled;

    /**
     * @var ?float $pressureReplicaStaleLimit The maximum number of stale replica shards that can exist in a replication group. Once `segrep.pressure.replica.stale.limit` is breached, the segment replication backpressure mechanism is initiated. Default is .5, which is 50% of a replication group.
     */
    #[JsonProperty('pressure.replica.stale.limit')]
    public ?float $pressureReplicaStaleLimit;

    /**
     * @var ?string $pressureTimeLimit The maximum amount of time that a replica shard can take to copy from the primary shard. Once segrep.pressure.time.limit is breached along with segrep.pressure.checkpoint.limit, the segment replication backpressure mechanism is initiated. Default is 5 minutes.
     */
    #[JsonProperty('pressure.time.limit')]
    public ?string $pressureTimeLimit;

    /**
     * @param array{
     *   pressureCheckpointLimit?: ?int,
     *   pressureEnabled?: ?bool,
     *   pressureReplicaStaleLimit?: ?float,
     *   pressureTimeLimit?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pressureCheckpointLimit = $values['pressureCheckpointLimit'] ?? null;
        $this->pressureEnabled = $values['pressureEnabled'] ?? null;
        $this->pressureReplicaStaleLimit = $values['pressureReplicaStaleLimit'] ?? null;
        $this->pressureTimeLimit = $values['pressureTimeLimit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
