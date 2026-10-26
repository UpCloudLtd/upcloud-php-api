<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A list of routers
 */
class Routers extends JsonSerializableType
{
    /**
     * @var RoutersRouters $routers
     */
    #[JsonProperty('routers')]
    public RoutersRouters $routers;

    /**
     * @param array{
     *   routers: RoutersRouters,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->routers = $values['routers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
