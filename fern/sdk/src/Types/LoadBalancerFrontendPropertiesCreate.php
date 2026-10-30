<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Frontend Properties
 */
class LoadBalancerFrontendPropertiesCreate extends JsonSerializableType
{
    /**
     * @var ?int $timeoutClient Client timeout
     */
    #[JsonProperty('timeout_client')]
    public ?int $timeoutClient;

    /**
     * @var ?bool $inboundProxyProtocol Enable or disable inbound proxy protocol support
     */
    #[JsonProperty('inbound_proxy_protocol')]
    public ?bool $inboundProxyProtocol;

    /**
     * @var ?bool $http2Enabled Allows for HTTP2 connection via ALPN
     */
    #[JsonProperty('http2_enabled')]
    public ?bool $http2Enabled;

    /**
     * @param array{
     *   timeoutClient?: ?int,
     *   inboundProxyProtocol?: ?bool,
     *   http2Enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timeoutClient = $values['timeoutClient'] ?? null;
        $this->inboundProxyProtocol = $values['inboundProxyProtocol'] ?? null;
        $this->http2Enabled = $values['http2Enabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
