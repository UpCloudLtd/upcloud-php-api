<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a single router
 */
class Router extends JsonSerializableType
{
    /**
     * @var RouterDetails $router
     */
    #[JsonProperty('router')]
    public RouterDetails $router;

    /**
     * @param array{
     *   router: RouterDetails,
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
