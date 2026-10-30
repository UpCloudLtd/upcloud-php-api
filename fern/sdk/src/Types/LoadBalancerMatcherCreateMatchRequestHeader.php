<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchRequestHeader extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchRequestHeaderType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var (
     *    LoadBalancerMatcherStringArgCreateIgnoreCase
     *   |LoadBalancerMatcherStringArgCreateOne
     * ) $matchRequestHeader
     */
    #[JsonProperty('match_request_header'), Union(LoadBalancerMatcherStringArgCreateIgnoreCase::class, LoadBalancerMatcherStringArgCreateOne::class)]
    public LoadBalancerMatcherStringArgCreateIgnoreCase|LoadBalancerMatcherStringArgCreateOne $matchRequestHeader;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchRequestHeaderType>,
     *   matchRequestHeader: (
     *    LoadBalancerMatcherStringArgCreateIgnoreCase
     *   |LoadBalancerMatcherStringArgCreateOne
     * ),
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchRequestHeader = $values['matchRequestHeader'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
