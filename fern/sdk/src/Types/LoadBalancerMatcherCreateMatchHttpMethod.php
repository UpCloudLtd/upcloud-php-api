<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateMatchHttpMethod extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchHttpMethodType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherHttpMethodCreate $matchHttpMethod
     */
    #[JsonProperty('match_http_method')]
    public LoadBalancerMatcherHttpMethodCreate $matchHttpMethod;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchHttpMethodType>,
     *   matchHttpMethod: LoadBalancerMatcherHttpMethodCreate,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchHttpMethod = $values['matchHttpMethod'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
