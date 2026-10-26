<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionHttpRedirectCreateLocation extends JsonSerializableType
{
    /**
     * @var string $location Value
     */
    #[JsonProperty('location')]
    public string $location;

    /**
     * @var ?int $status HTTP Status code
     */
    #[JsonProperty('status')]
    public ?int $status;

    /**
     * @param array{
     *   location: string,
     *   status?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->location = $values['location'];
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
