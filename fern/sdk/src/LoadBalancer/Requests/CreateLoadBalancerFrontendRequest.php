<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerFrontendCreate;

class CreateLoadBalancerFrontendRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerFrontendCreate $body
     */
    public LoadBalancerFrontendCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerFrontendCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
