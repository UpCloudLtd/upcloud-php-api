<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Represents a rule action that defines how matched traffic should be processed or modified within the load balancer. Each action type includes a corresponding configuration object.
 */
class LoadBalancerActionResponse extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionResponseType> $type Type of action defining how matched requests should be processed or modified.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?LoadBalancerActionUseBackendResponse $actionUseBackend
     */
    #[JsonProperty('action_use_backend')]
    public ?LoadBalancerActionUseBackendResponse $actionUseBackend;

    /**
     * @var ?LoadBalancerActionHttpReturnResponse $actionHttpReturn
     */
    #[JsonProperty('action_http_return')]
    public ?LoadBalancerActionHttpReturnResponse $actionHttpReturn;

    /**
     * @var ?LoadBalancerActionHttpRedirectResponse $actionHttpRedirect
     */
    #[JsonProperty('action_http_redirect')]
    public ?LoadBalancerActionHttpRedirectResponse $actionHttpRedirect;

    /**
     * @var ?array<string, mixed> $actionTcpReject
     */
    #[JsonProperty('action_tcp_reject'), ArrayType(['string' => 'mixed'])]
    public ?array $actionTcpReject;

    /**
     * @var ?array<string, mixed> $actionSetForwardedHeaders
     */
    #[JsonProperty('action_set_forwarded_headers'), ArrayType(['string' => 'mixed'])]
    public ?array $actionSetForwardedHeaders;

    /**
     * @var ?LoadBalancerActionSetHeaderResponse $actionSetRequestHeader
     */
    #[JsonProperty('action_set_request_header')]
    public ?LoadBalancerActionSetHeaderResponse $actionSetRequestHeader;

    /**
     * @var ?LoadBalancerActionSetHeaderResponse $actionSetResponseHeader
     */
    #[JsonProperty('action_set_response_header')]
    public ?LoadBalancerActionSetHeaderResponse $actionSetResponseHeader;

    /**
     * @var ?LoadBalancerActionHttpRewritePathResponse $actionHttpRewritePath
     */
    #[JsonProperty('action_http_rewrite_path')]
    public ?LoadBalancerActionHttpRewritePathResponse $actionHttpRewritePath;

    /**
     * @var ?LoadBalancerActionHttpRewriteUriResponse $actionHttpRewriteUri
     */
    #[JsonProperty('action_http_rewrite_uri')]
    public ?LoadBalancerActionHttpRewriteUriResponse $actionHttpRewriteUri;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionResponseType>,
     *   actionUseBackend?: ?LoadBalancerActionUseBackendResponse,
     *   actionHttpReturn?: ?LoadBalancerActionHttpReturnResponse,
     *   actionHttpRedirect?: ?LoadBalancerActionHttpRedirectResponse,
     *   actionTcpReject?: ?array<string, mixed>,
     *   actionSetForwardedHeaders?: ?array<string, mixed>,
     *   actionSetRequestHeader?: ?LoadBalancerActionSetHeaderResponse,
     *   actionSetResponseHeader?: ?LoadBalancerActionSetHeaderResponse,
     *   actionHttpRewritePath?: ?LoadBalancerActionHttpRewritePathResponse,
     *   actionHttpRewriteUri?: ?LoadBalancerActionHttpRewriteUriResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionUseBackend = $values['actionUseBackend'] ?? null;
        $this->actionHttpReturn = $values['actionHttpReturn'] ?? null;
        $this->actionHttpRedirect = $values['actionHttpRedirect'] ?? null;
        $this->actionTcpReject = $values['actionTcpReject'] ?? null;
        $this->actionSetForwardedHeaders = $values['actionSetForwardedHeaders'] ?? null;
        $this->actionSetRequestHeader = $values['actionSetRequestHeader'] ?? null;
        $this->actionSetResponseHeader = $values['actionSetResponseHeader'] ?? null;
        $this->actionHttpRewritePath = $values['actionHttpRewritePath'] ?? null;
        $this->actionHttpRewriteUri = $values['actionHttpRewriteUri'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
