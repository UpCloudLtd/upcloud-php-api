<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchResponseHeader extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchResponseHeaderType> $type
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
     * ) $matchResponseHeader
     */
    #[JsonProperty('match_response_header'), Union(LoadBalancerMatcherStringArgCreateIgnoreCase::class, LoadBalancerMatcherStringArgCreateOne::class)]
    public LoadBalancerMatcherStringArgCreateIgnoreCase|LoadBalancerMatcherStringArgCreateOne $matchResponseHeader;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchResponseHeaderType>,
     *   matchResponseHeader: (
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
        $this->matchResponseHeader = $values['matchResponseHeader'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
