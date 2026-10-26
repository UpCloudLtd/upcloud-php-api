<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerTlsConfigModify;

class ModifyLoadBalancerBackendTlsConfigRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerTlsConfigModify $body
     */
    public LoadBalancerTlsConfigModify $body;

    /**
     * @param array{
     *   body: LoadBalancerTlsConfigModify,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
