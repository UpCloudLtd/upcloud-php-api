<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * List of available timezones
 */
class Timezones extends JsonSerializableType
{
    /**
     * @var TimezonesTimezones $timezones
     */
    #[JsonProperty('timezones')]
    public TimezonesTimezones $timezones;

    /**
     * @param array{
     *   timezones: TimezonesTimezones,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timezones = $values['timezones'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
