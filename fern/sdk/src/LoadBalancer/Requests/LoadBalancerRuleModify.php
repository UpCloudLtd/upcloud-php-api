<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\LoadBalancerMatchingCondition;
use Upcloud\Types\LoadBalancerMatcherCreateMatchSrcIp;
use Upcloud\Types\LoadBalancerMatcherCreateMatchSrcPort;
use Upcloud\Types\LoadBalancerMatcherCreateMatchBodySize;
use Upcloud\Types\LoadBalancerMatcherCreateMatchCookie;
use Upcloud\Types\LoadBalancerMatcherCreateMatchHeader;
use Upcloud\Types\LoadBalancerMatcherCreateMatchUrlParam;
use Upcloud\Types\LoadBalancerMatcherCreateMatchHttpMethod;
use Upcloud\Types\LoadBalancerMatcherCreateMatchPath;
use Upcloud\Types\LoadBalancerMatcherCreateMatchUrl;
use Upcloud\Types\LoadBalancerMatcherCreateMatchHost;
use Upcloud\Types\LoadBalancerMatcherCreateMatchUrlQuery;
use Upcloud\Types\LoadBalancerMatcherCreateMatchNumMembersUp;
use Upcloud\Types\LoadBalancerMatcherCreateMatchRequestHeader;
use Upcloud\Types\LoadBalancerMatcherCreateMatchResponseHeader;
use Upcloud\Types\LoadBalancerMatcherCreateInverse;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;
use Upcloud\Types\LoadBalancerActionCreateActionUseBackend;
use Upcloud\Types\LoadBalancerActionCreateActionHttpReturn;
use Upcloud\Types\LoadBalancerActionCreateActionHttpRedirect;
use Upcloud\Types\LoadBalancerActionCreateActionTcpReject;
use Upcloud\Types\LoadBalancerActionCreateActionSetForwardedHeaders;
use Upcloud\Types\LoadBalancerActionCreateActionSetRequestHeader;
use Upcloud\Types\LoadBalancerActionCreateActionSetResponseHeader;
use Upcloud\Types\LoadBalancerActionCreateActionHttpRewritePath;
use Upcloud\Types\LoadBalancerActionCreateActionHttpRewriteUri;

class LoadBalancerRuleModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the rule
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $priority Priority
     */
    #[JsonProperty('priority')]
    public ?int $priority;

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
     * @var ?array<(
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
    public ?array $actions;

    /**
     * @param array{
     *   name?: ?string,
     *   priority?: ?int,
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
     *   actions?: ?array<(
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
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->matchingCondition = $values['matchingCondition'] ?? null;
        $this->matchers = $values['matchers'] ?? null;
        $this->actions = $values['actions'] ?? null;
    }
}
