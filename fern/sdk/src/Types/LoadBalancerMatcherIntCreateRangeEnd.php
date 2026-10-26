<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;

class LoadBalancerMatcherIntCreateRangeEnd extends JsonSerializableType
{
    /**
     * @param array{
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        unset($values);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
