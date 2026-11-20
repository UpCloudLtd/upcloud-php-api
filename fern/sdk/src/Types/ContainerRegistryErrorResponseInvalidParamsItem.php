<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryErrorResponseInvalidParamsItem extends JsonSerializableType
{
    /**
     * @var string $name Name of the invalid parameter
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $reason Explanation of why the parameter is invalid
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
