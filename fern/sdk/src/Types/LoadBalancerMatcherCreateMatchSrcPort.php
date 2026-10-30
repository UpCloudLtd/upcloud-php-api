<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateMatchSrcPort extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchSrcPortType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherIntCreateRangeEnd $matchSrcPort
     */
    #[JsonProperty('match_src_port')]
    public LoadBalancerMatcherIntCreateRangeEnd $matchSrcPort;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchSrcPortType>,
     *   matchSrcPort: LoadBalancerMatcherIntCreateRangeEnd,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchSrcPort = $values['matchSrcPort'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
