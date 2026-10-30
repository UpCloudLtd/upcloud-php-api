<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerResolverCreate;

class CreateLoadBalancerResolverRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerResolverCreate $body
     */
    public LoadBalancerResolverCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerResolverCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
