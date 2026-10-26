<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseMaintenanceDow;
use Upcloud\Core\Json\JsonProperty;

/**
 * Weekly maintenance window.
 */
class DatabaseServiceModifyOpenApiMaintenance extends JsonSerializableType
{
    /**
     * @var value-of<DatabaseMaintenanceDow> $dow
     */
    #[JsonProperty('dow')]
    public string $dow;

    /**
     * @var string $time
     */
    #[JsonProperty('time')]
    public string $time;

    /**
     * @param array{
     *   dow: value-of<DatabaseMaintenanceDow>,
     *   time: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dow = $values['dow'];
        $this->time = $values['time'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
