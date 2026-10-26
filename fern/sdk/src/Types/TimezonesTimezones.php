<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class TimezonesTimezones extends JsonSerializableType
{
    /**
     * @var array<string> $timezone
     */
    #[JsonProperty('timezone'), ArrayType(['string'])]
    public array $timezone;

    /**
     * @param array{
     *   timezone: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timezone = $values['timezone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
