<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchUrlQuery extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchUrlQueryType> $type
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
     * ) $matchUrlQuery
     */
    #[JsonProperty('match_url_query'), Union(LoadBalancerMatcherStringCreateIgnoreCase::class, LoadBalancerMatcherStringCreateOne::class)]
    public LoadBalancerMatcherStringCreateIgnoreCase|LoadBalancerMatcherStringCreateOne $matchUrlQuery;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchUrlQueryType>,
     *   matchUrlQuery: (
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
        $this->matchUrlQuery = $values['matchUrlQuery'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
