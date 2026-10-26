<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerBackendCreate;

class CreateLoadBalancerBackendRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerBackendCreate $body
     */
    public LoadBalancerBackendCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerBackendCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
