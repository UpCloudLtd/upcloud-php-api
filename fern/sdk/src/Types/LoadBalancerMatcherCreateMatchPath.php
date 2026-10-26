<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerMatcherCreateMatchPath extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchPathType> $type
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
     * ) $matchPath
     */
    #[JsonProperty('match_path'), Union(LoadBalancerMatcherStringCreateIgnoreCase::class, LoadBalancerMatcherStringCreateOne::class)]
    public LoadBalancerMatcherStringCreateIgnoreCase|LoadBalancerMatcherStringCreateOne $matchPath;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchPathType>,
     *   matchPath: (
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
        $this->matchPath = $values['matchPath'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
