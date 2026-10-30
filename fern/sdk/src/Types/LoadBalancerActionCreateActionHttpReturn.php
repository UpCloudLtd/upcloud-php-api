<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionCreateActionHttpReturn extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionHttpReturnType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var LoadBalancerActionHttpReturnCreate $actionHttpReturn
     */
    #[JsonProperty('action_http_return')]
    public LoadBalancerActionHttpReturnCreate $actionHttpReturn;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionHttpReturnType>,
     *   actionHttpReturn: LoadBalancerActionHttpReturnCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionHttpReturn = $values['actionHttpReturn'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
