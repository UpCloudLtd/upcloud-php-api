<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;

/**
 * Load Balancer Forwarding Rule
 */
class LoadBalancerRuleCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the rule
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $priority Priority
     */
    #[JsonProperty('priority')]
    public int $priority;

    /**
     * @var ?value-of<LoadBalancerMatchingCondition> $matchingCondition
     */
    #[JsonProperty('matching_condition')]
    public ?string $matchingCondition;

    /**
     * @var ?array<(
     *    LoadBalancerMatcherCreateMatchSrcIp
     *   |LoadBalancerMatcherCreateMatchSrcPort
     *   |LoadBalancerMatcherCreateMatchBodySize
     *   |LoadBalancerMatcherCreateMatchCookie
     *   |LoadBalancerMatcherCreateMatchHeader
     *   |LoadBalancerMatcherCreateMatchUrlParam
     *   |LoadBalancerMatcherCreateMatchHttpMethod
     *   |LoadBalancerMatcherCreateMatchPath
     *   |LoadBalancerMatcherCreateMatchUrl
     *   |LoadBalancerMatcherCreateMatchHost
     *   |LoadBalancerMatcherCreateMatchUrlQuery
     *   |LoadBalancerMatcherCreateMatchNumMembersUp
     *   |LoadBalancerMatcherCreateMatchRequestHeader
     *   |LoadBalancerMatcherCreateMatchResponseHeader
     *   |LoadBalancerMatcherCreateInverse
     * )> $matchers Rule matchers
     */
    #[JsonProperty('matchers'), ArrayType([new Union(LoadBalancerMatcherCreateMatchSrcIp::class, LoadBalancerMatcherCreateMatchSrcPort::class, LoadBalancerMatcherCreateMatchBodySize::class, LoadBalancerMatcherCreateMatchCookie::class, LoadBalancerMatcherCreateMatchHeader::class, LoadBalancerMatcherCreateMatchUrlParam::class, LoadBalancerMatcherCreateMatchHttpMethod::class, LoadBalancerMatcherCreateMatchPath::class, LoadBalancerMatcherCreateMatchUrl::class, LoadBalancerMatcherCreateMatchHost::class, LoadBalancerMatcherCreateMatchUrlQuery::class, LoadBalancerMatcherCreateMatchNumMembersUp::class, LoadBalancerMatcherCreateMatchRequestHeader::class, LoadBalancerMatcherCreateMatchResponseHeader::class, LoadBalancerMatcherCreateInverse::class)])]
    public ?array $matchers;

    /**
     * @var array<(
     *    LoadBalancerActionCreateActionUseBackend
     *   |LoadBalancerActionCreateActionHttpReturn
     *   |LoadBalancerActionCreateActionHttpRedirect
     *   |LoadBalancerActionCreateActionTcpReject
     *   |LoadBalancerActionCreateActionSetForwardedHeaders
     *   |LoadBalancerActionCreateActionSetRequestHeader
     *   |LoadBalancerActionCreateActionSetResponseHeader
     *   |LoadBalancerActionCreateActionHttpRewritePath
     *   |LoadBalancerActionCreateActionHttpRewriteUri
     * )> $actions Rule actions
     */
    #[JsonProperty('actions'), ArrayType([new Union(LoadBalancerActionCreateActionUseBackend::class, LoadBalancerActionCreateActionHttpReturn::class, LoadBalancerActionCreateActionHttpRedirect::class, LoadBalancerActionCreateActionTcpReject::class, LoadBalancerActionCreateActionSetForwardedHeaders::class, LoadBalancerActionCreateActionSetRequestHeader::class, LoadBalancerActionCreateActionSetResponseHeader::class, LoadBalancerActionCreateActionHttpRewritePath::class, LoadBalancerActionCreateActionHttpRewriteUri::class)])]
    public array $actions;

    /**
     * @param array{
     *   name: string,
     *   priority: int,
     *   actions: array<(
     *    LoadBalancerActionCreateActionUseBackend
     *   |LoadBalancerActionCreateActionHttpReturn
     *   |LoadBalancerActionCreateActionHttpRedirect
     *   |LoadBalancerActionCreateActionTcpReject
     *   |LoadBalancerActionCreateActionSetForwardedHeaders
     *   |LoadBalancerActionCreateActionSetRequestHeader
     *   |LoadBalancerActionCreateActionSetResponseHeader
     *   |LoadBalancerActionCreateActionHttpRewritePath
     *   |LoadBalancerActionCreateActionHttpRewriteUri
     * )>,
     *   matchingCondition?: ?value-of<LoadBalancerMatchingCondition>,
     *   matchers?: ?array<(
     *    LoadBalancerMatcherCreateMatchSrcIp
     *   |LoadBalancerMatcherCreateMatchSrcPort
     *   |LoadBalancerMatcherCreateMatchBodySize
     *   |LoadBalancerMatcherCreateMatchCookie
     *   |LoadBalancerMatcherCreateMatchHeader
     *   |LoadBalancerMatcherCreateMatchUrlParam
     *   |LoadBalancerMatcherCreateMatchHttpMethod
     *   |LoadBalancerMatcherCreateMatchPath
     *   |LoadBalancerMatcherCreateMatchUrl
     *   |LoadBalancerMatcherCreateMatchHost
     *   |LoadBalancerMatcherCreateMatchUrlQuery
     *   |LoadBalancerMatcherCreateMatchNumMembersUp
     *   |LoadBalancerMatcherCreateMatchRequestHeader
     *   |LoadBalancerMatcherCreateMatchResponseHeader
     *   |LoadBalancerMatcherCreateInverse
     * )>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->priority = $values['priority'];
        $this->matchingCondition = $values['matchingCondition'] ?? null;
        $this->matchers = $values['matchers'] ?? null;
        $this->actions = $values['actions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
