<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * System-wide settings for the timescaledb extension
 */
class DatabaseServicePropertiesPgTimescaledb extends JsonSerializableType
{
    /**
     * @var ?int $maxBackgroundWorkers The number of background workers for timescaledb operations. You should configure this setting to the sum of your number of databases and the total number of concurrent background workers you want running at any given point in time. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_background_workers')]
    public ?int $maxBackgroundWorkers;

    /**
     * @param array{
     *   maxBackgroundWorkers?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->maxBackgroundWorkers = $values['maxBackgroundWorkers'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
