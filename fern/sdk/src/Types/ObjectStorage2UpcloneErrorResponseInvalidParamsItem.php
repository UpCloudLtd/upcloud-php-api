<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2UpcloneErrorResponseInvalidParamsItem extends JsonSerializableType
{
    /**
     * @var string $name Name of the invalid parameter or field.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $reason Why the value was invalid.
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
