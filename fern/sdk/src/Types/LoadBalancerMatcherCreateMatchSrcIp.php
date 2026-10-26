<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateMatchSrcIp extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchSrcIpType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherIpCreate $matchSrcIp
     */
    #[JsonProperty('match_src_ip')]
    public LoadBalancerMatcherIpCreate $matchSrcIp;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchSrcIpType>,
     *   matchSrcIp: LoadBalancerMatcherIpCreate,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchSrcIp = $values['matchSrcIp'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
