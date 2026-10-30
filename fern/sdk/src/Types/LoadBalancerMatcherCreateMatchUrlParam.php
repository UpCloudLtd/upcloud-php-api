<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchUrlParam extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchUrlParamType> $type
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
     * ) $matchUrlParam
     */
    #[JsonProperty('match_url_param'), Union(LoadBalancerMatcherStringArgCreateIgnoreCase::class, LoadBalancerMatcherStringArgCreateOne::class)]
    public LoadBalancerMatcherStringArgCreateIgnoreCase|LoadBalancerMatcherStringArgCreateOne $matchUrlParam;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchUrlParamType>,
     *   matchUrlParam: (
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
        $this->matchUrlParam = $values['matchUrlParam'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
