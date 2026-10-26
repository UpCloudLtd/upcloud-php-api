<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerLabelModify;

class ModifyLoadBalancerLabelRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerLabelModify $body
     */
    public LoadBalancerLabelModify $body;

    /**
     * @param array{
     *   body: LoadBalancerLabelModify,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
