<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines a matcher used to evaluate specific conditions in requests or responses.
 */
class LoadBalancerMatcherResponse extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherResponseType> $type Type of matcher defining which aspect of the request or response to evaluate.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var bool $inverse Indicates whether to invert the match result (true) or use it as-is (false).
     */
    #[JsonProperty('inverse')]
    public bool $inverse;

    /**
     * @var ?LoadBalancerMatchIpResponse $matchSrcIp
     */
    #[JsonProperty('match_src_ip')]
    public ?LoadBalancerMatchIpResponse $matchSrcIp;

    /**
     * @var ?LoadBalancerMatchIntResponse $matchSrcPort
     */
    #[JsonProperty('match_src_port')]
    public ?LoadBalancerMatchIntResponse $matchSrcPort;

    /**
     * @var ?LoadBalancerMatchIntResponse $matchBodySize
     */
    #[JsonProperty('match_body_size')]
    public ?LoadBalancerMatchIntResponse $matchBodySize;

    /**
     * @var ?LoadBalancerMatchStringWithArgResponse $matchCookie
     */
    #[JsonProperty('match_cookie')]
    public ?LoadBalancerMatchStringWithArgResponse $matchCookie;

    /**
     * @var ?LoadBalancerMatchStringWithArgResponse $matchHeader
     */
    #[JsonProperty('match_header')]
    public ?LoadBalancerMatchStringWithArgResponse $matchHeader;

    /**
     * @var ?LoadBalancerMatchStringWithArgResponse $matchUrlParam
     */
    #[JsonProperty('match_url_param')]
    public ?LoadBalancerMatchStringWithArgResponse $matchUrlParam;

    /**
     * @var ?LoadBalancerMatchStringWithArgResponse $matchRequestHeader
     */
    #[JsonProperty('match_request_header')]
    public ?LoadBalancerMatchStringWithArgResponse $matchRequestHeader;

    /**
     * @var ?LoadBalancerMatchStringWithArgResponse $matchResponseHeader
     */
    #[JsonProperty('match_response_header')]
    public ?LoadBalancerMatchStringWithArgResponse $matchResponseHeader;

    /**
     * @var ?LoadBalancerMatchIntResponse $matchHttpStatus
     */
    #[JsonProperty('match_http_status')]
    public ?LoadBalancerMatchIntResponse $matchHttpStatus;

    /**
     * @var ?LoadBalancerMatchStringResponse $matchHttpMethod
     */
    #[JsonProperty('match_http_method')]
    public ?LoadBalancerMatchStringResponse $matchHttpMethod;

    /**
     * @var ?LoadBalancerMatchStringResponse $matchPath
     */
    #[JsonProperty('match_path')]
    public ?LoadBalancerMatchStringResponse $matchPath;

    /**
     * @var ?LoadBalancerMatchStringResponse $matchUrl
     */
    #[JsonProperty('match_url')]
    public ?LoadBalancerMatchStringResponse $matchUrl;

    /**
     * @var ?LoadBalancerMatchStringResponse $matchHost
     */
    #[JsonProperty('match_host')]
    public ?LoadBalancerMatchStringResponse $matchHost;

    /**
     * @var ?LoadBalancerMatchStringResponse $matchUrlQuery
     */
    #[JsonProperty('match_url_query')]
    public ?LoadBalancerMatchStringResponse $matchUrlQuery;

    /**
     * @var ?LoadBalancerMatchBackendResponse $matchNumMembersUp
     */
    #[JsonProperty('match_num_members_up')]
    public ?LoadBalancerMatchBackendResponse $matchNumMembersUp;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherResponseType>,
     *   inverse: bool,
     *   matchSrcIp?: ?LoadBalancerMatchIpResponse,
     *   matchSrcPort?: ?LoadBalancerMatchIntResponse,
     *   matchBodySize?: ?LoadBalancerMatchIntResponse,
     *   matchCookie?: ?LoadBalancerMatchStringWithArgResponse,
     *   matchHeader?: ?LoadBalancerMatchStringWithArgResponse,
     *   matchUrlParam?: ?LoadBalancerMatchStringWithArgResponse,
     *   matchRequestHeader?: ?LoadBalancerMatchStringWithArgResponse,
     *   matchResponseHeader?: ?LoadBalancerMatchStringWithArgResponse,
     *   matchHttpStatus?: ?LoadBalancerMatchIntResponse,
     *   matchHttpMethod?: ?LoadBalancerMatchStringResponse,
     *   matchPath?: ?LoadBalancerMatchStringResponse,
     *   matchUrl?: ?LoadBalancerMatchStringResponse,
     *   matchHost?: ?LoadBalancerMatchStringResponse,
     *   matchUrlQuery?: ?LoadBalancerMatchStringResponse,
     *   matchNumMembersUp?: ?LoadBalancerMatchBackendResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'];
        $this->matchSrcIp = $values['matchSrcIp'] ?? null;
        $this->matchSrcPort = $values['matchSrcPort'] ?? null;
        $this->matchBodySize = $values['matchBodySize'] ?? null;
        $this->matchCookie = $values['matchCookie'] ?? null;
        $this->matchHeader = $values['matchHeader'] ?? null;
        $this->matchUrlParam = $values['matchUrlParam'] ?? null;
        $this->matchRequestHeader = $values['matchRequestHeader'] ?? null;
        $this->matchResponseHeader = $values['matchResponseHeader'] ?? null;
        $this->matchHttpStatus = $values['matchHttpStatus'] ?? null;
        $this->matchHttpMethod = $values['matchHttpMethod'] ?? null;
        $this->matchPath = $values['matchPath'] ?? null;
        $this->matchUrl = $values['matchUrl'] ?? null;
        $this->matchHost = $values['matchHost'] ?? null;
        $this->matchUrlQuery = $values['matchUrlQuery'] ?? null;
        $this->matchNumMembersUp = $values['matchNumMembersUp'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
