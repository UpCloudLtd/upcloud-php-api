<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerRuleCreate;

class ReplaceLoadBalancerRuleRequest extends JsonSerializableType
{
    /**
     * @var LoadBalancerRuleCreate $body
     */
    public LoadBalancerRuleCreate $body;

    /**
     * @param array{
     *   body: LoadBalancerRuleCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
