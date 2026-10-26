<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines configurable properties for a frontend, such as client timeout settings, protocol options, and linkage to its parent frontend resource.
 */
class LoadBalancerFrontendPropertiesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $inboundProxyProtocol Enables or disables support for the Proxy Protocol on inbound connections, allowing client IP addresses to be forwarded to the backend.
     */
    #[JsonProperty('inbound_proxy_protocol')]
    public ?bool $inboundProxyProtocol;

    /**
     * @var int $timeoutClient Maximum inactivity timeout for a client connection, in milliseconds. Determines how long a client connection can remain idle before being closed.
     */
    #[JsonProperty('timeout_client')]
    public int $timeoutClient;

    /**
     * @var ?bool $http2Enabled Indicates whether HTTP/2 protocol support is enabled for this frontend.
     */
    #[JsonProperty('http2_enabled')]
    public ?bool $http2Enabled;

    /**
     * @var int $frontendId Identifier linking these properties to the parent frontend configuration.
     */
    #[JsonProperty('frontend_id')]
    public int $frontendId;

    /**
     * @param array{
     *   timeoutClient: int,
     *   frontendId: int,
     *   inboundProxyProtocol?: ?bool,
     *   http2Enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->inboundProxyProtocol = $values['inboundProxyProtocol'] ?? null;
        $this->timeoutClient = $values['timeoutClient'];
        $this->http2Enabled = $values['http2Enabled'] ?? null;
        $this->frontendId = $values['frontendId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
