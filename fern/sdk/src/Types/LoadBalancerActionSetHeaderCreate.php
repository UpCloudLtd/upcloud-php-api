<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Forwarding rule HTTP set header action
 */
class LoadBalancerActionSetHeaderCreate extends JsonSerializableType
{
    /**
     * @var string $header Name of the HTTP header to set or modify in the request or response.
     */
    #[JsonProperty('header')]
    public string $header;

    /**
     * @var ?string $value Value to assign to the specified HTTP header.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   header: string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->header = $values['header'];
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
