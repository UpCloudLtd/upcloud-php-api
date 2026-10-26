<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerMemberCreateZero;
use Upcloud\Types\LoadBalancerMemberCreateOne;

class CreateLoadBalancerMemberRequest extends JsonSerializableType
{
    /**
     * @var (
     *    LoadBalancerMemberCreateZero
     *   |LoadBalancerMemberCreateOne
     * ) $body
     */
    public LoadBalancerMemberCreateZero|LoadBalancerMemberCreateOne $body;

    /**
     * @param array{
     *   body: (
     *    LoadBalancerMemberCreateZero
     *   |LoadBalancerMemberCreateOne
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
