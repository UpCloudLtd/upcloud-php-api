<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchCookie extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchCookieType> $type
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
     * ) $matchCookie
     */
    #[JsonProperty('match_cookie'), Union(LoadBalancerMatcherStringArgCreateIgnoreCase::class, LoadBalancerMatcherStringArgCreateOne::class)]
    public LoadBalancerMatcherStringArgCreateIgnoreCase|LoadBalancerMatcherStringArgCreateOne $matchCookie;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchCookieType>,
     *   matchCookie: (
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
        $this->matchCookie = $values['matchCookie'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
