<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class HostStatsStatItem extends JsonSerializableType
{
    /**
     * @var value-of<HostStatsStatItemName> $name Statistic name. CPU idle is a percentage and free memory is measured in gigabytes.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var DateTime $timestamp
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public DateTime $timestamp;

    /**
     * @var float $value The statistic value at the specified timestamp.
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @param array{
     *   name: value-of<HostStatsStatItemName>,
     *   timestamp: DateTime,
     *   value: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->timestamp = $values['timestamp'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
