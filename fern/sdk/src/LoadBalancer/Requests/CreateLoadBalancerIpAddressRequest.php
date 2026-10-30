<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerIpAddressCreate;

class CreateLoadBalancerIpAddressRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerIpAddressCreate $body
     */
    public LoadBalancerIpAddressCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerIpAddressCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
