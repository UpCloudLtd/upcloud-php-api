<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2ErrorResponseInvalidParamsItem extends JsonSerializableType
{
    /**
     * @var string $name Path to the field with invalid parameter.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $reason Human-readable error message.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   name: string,
     *   reason: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->reason = $values['reason'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
