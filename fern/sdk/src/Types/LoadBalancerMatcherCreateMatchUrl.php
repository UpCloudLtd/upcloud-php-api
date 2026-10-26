<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchUrl extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchUrlType> $type
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
     *    LoadBalancerMatcherStringCreateIgnoreCase
     *   |LoadBalancerMatcherStringCreateOne
     * ) $matchUrl
     */
    #[JsonProperty('match_url'), Union(LoadBalancerMatcherStringCreateIgnoreCase::class, LoadBalancerMatcherStringCreateOne::class)]
    public LoadBalancerMatcherStringCreateIgnoreCase|LoadBalancerMatcherStringCreateOne $matchUrl;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchUrlType>,
     *   matchUrl: (
     *    LoadBalancerMatcherStringCreateIgnoreCase
     *   |LoadBalancerMatcherStringCreateOne
     * ),
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchUrl = $values['matchUrl'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
