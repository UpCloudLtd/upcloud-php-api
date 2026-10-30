<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionCreateActionSetRequestHeader extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionSetRequestHeaderType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var LoadBalancerActionSetHeaderCreate $actionSetRequestHeader
     */
    #[JsonProperty('action_set_request_header')]
    public LoadBalancerActionSetHeaderCreate $actionSetRequestHeader;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionSetRequestHeaderType>,
     *   actionSetRequestHeader: LoadBalancerActionSetHeaderCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionSetRequestHeader = $values['actionSetRequestHeader'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
