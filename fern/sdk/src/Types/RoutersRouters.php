<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class RoutersRouters extends JsonSerializableType
{
    /**
     * @var array<RouterDetails> $router
     */
    #[JsonProperty('router'), ArrayType([RouterDetails::class])]
    public array $router;

    /**
     * @param array{
     *   router: array<RouterDetails>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->router = $values['router'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
