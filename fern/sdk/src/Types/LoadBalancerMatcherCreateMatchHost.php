<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateMatchHost extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchHostType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherHostCreate $matchHost
     */
    #[JsonProperty('match_host')]
    public LoadBalancerMatcherHostCreate $matchHost;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchHostType>,
     *   matchHost: LoadBalancerMatcherHostCreate,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchHost = $values['matchHost'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
