<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionCreateActionSetResponseHeader extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionSetResponseHeaderType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var LoadBalancerActionSetHeaderCreate $actionSetResponseHeader
     */
    #[JsonProperty('action_set_response_header')]
    public LoadBalancerActionSetHeaderCreate $actionSetResponseHeader;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionSetResponseHeaderType>,
     *   actionSetResponseHeader: LoadBalancerActionSetHeaderCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionSetResponseHeader = $values['actionSetResponseHeader'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
