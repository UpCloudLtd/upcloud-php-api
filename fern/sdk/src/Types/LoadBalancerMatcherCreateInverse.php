<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateInverse extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateInverseType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherIntCreateRangeEnd $matchHttpStatus
     */
    #[JsonProperty('match_http_status')]
    public LoadBalancerMatcherIntCreateRangeEnd $matchHttpStatus;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateInverseType>,
     *   matchHttpStatus: LoadBalancerMatcherIntCreateRangeEnd,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchHttpStatus = $values['matchHttpStatus'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
