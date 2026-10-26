<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerMemberModifyZero;
use Upcloud\Types\LoadBalancerMemberModifyOne;

class ModifyLoadBalancerMemberRequest extends JsonSerializableType
{
    /**
     * @var (
     *    LoadBalancerMemberModifyZero
     *   |LoadBalancerMemberModifyOne
     * ) $body
     */
    public LoadBalancerMemberModifyZero|LoadBalancerMemberModifyOne $body;

    /**
     * @param array{
     *   body: (
     *    LoadBalancerMemberModifyZero
     *   |LoadBalancerMemberModifyOne
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
