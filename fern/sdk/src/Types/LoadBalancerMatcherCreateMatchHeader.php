<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchHeader extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchHeaderType> $type
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
     * ) $matchHeader
     */
    #[JsonProperty('match_header'), Union(LoadBalancerMatcherStringArgCreateIgnoreCase::class, LoadBalancerMatcherStringArgCreateOne::class)]
    public LoadBalancerMatcherStringArgCreateIgnoreCase|LoadBalancerMatcherStringArgCreateOne $matchHeader;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchHeaderType>,
     *   matchHeader: (
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
        $this->matchHeader = $values['matchHeader'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
