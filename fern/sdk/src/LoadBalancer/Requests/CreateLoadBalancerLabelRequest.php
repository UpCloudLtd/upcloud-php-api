<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerLabelCreate;

class CreateLoadBalancerLabelRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerLabelCreate $body
     */
    public LoadBalancerLabelCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerLabelCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
