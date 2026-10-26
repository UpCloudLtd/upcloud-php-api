<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerTlsConfigCreate;

class CreateLoadBalancerBackendTlsConfigRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerTlsConfigCreate $body
     */
    public LoadBalancerTlsConfigCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerTlsConfigCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
