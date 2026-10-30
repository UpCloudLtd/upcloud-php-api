<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateMatchBodySize extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchBodySizeType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherIntCreateRangeEnd $matchBodySize
     */
    #[JsonProperty('match_body_size')]
    public LoadBalancerMatcherIntCreateRangeEnd $matchBodySize;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchBodySizeType>,
     *   matchBodySize: LoadBalancerMatcherIntCreateRangeEnd,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchBodySize = $values['matchBodySize'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
