<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Backend Properties
 */
class LoadBalancerBackendPropertiesCreate extends JsonSerializableType
{
    /**
     * @var ?int $timeoutServer Server timeout
     */
    #[JsonProperty('timeout_server')]
    public ?int $timeoutServer;

    /**
     * @var ?int $timeoutTunnel Tunnel timeout
     */
    #[JsonProperty('timeout_tunnel')]
    public ?int $timeoutTunnel;

    /**
     * @var ?value-of<LoadBalancerProxyProtocolVersionOrDisabled> $outboundProxyProtocol
     */
    #[JsonProperty('outbound_proxy_protocol')]
    public ?string $outboundProxyProtocol;

    /**
     * @var ?value-of<LoadBalancerHealthCheckType> $healthCheckType
     */
    #[JsonProperty('health_check_type')]
    public ?string $healthCheckType;

    /**
     * @var ?int $healthCheckInterval Interval between health checks
     */
    #[JsonProperty('health_check_interval')]
    public ?int $healthCheckInterval;

    /**
     * @var ?int $healthCheckFall Sets how many failed health checks are allowed
     */
    #[JsonProperty('health_check_fall')]
    public ?int $healthCheckFall;

    /**
     * @var ?int $healthCheckRise Sets how many passing checks there must be before returning server to the rotation
     */
    #[JsonProperty('health_check_rise')]
    public ?int $healthCheckRise;

    /**
     * @var ?string $healthCheckUrl Target url for health check HTTP GET requests
     */
    #[JsonProperty('health_check_url')]
    public ?string $healthCheckUrl;

    /**
     * @var ?int $healthCheckExpectedStatus Expected HTTP status code returned by the customer application to mark server as healthy
     */
    #[JsonProperty('health_check_expected_status')]
    public ?int $healthCheckExpectedStatus;

    /**
     * @var ?value-of<LoadBalancerChecksOnDown> $healthCheckOnDown
     */
    #[JsonProperty('health_check_on_down')]
    public ?string $healthCheckOnDown;

    /**
     * @var ?bool $healthCheckTlsVerify Allows health check CA verification on TLS connections
     */
    #[JsonProperty('health_check_tls_verify')]
    public ?bool $healthCheckTlsVerify;

    /**
     * @var ?string $stickySessionCookieName Sets sticky session cookie name. Empty string disables sticky session.
     */
    #[JsonProperty('sticky_session_cookie_name')]
    public ?string $stickySessionCookieName;

    /**
     * @var ?string $stickySessionCookieAttributes Controls additional cookie attributes appended to sticky session cookies. Supports combinations of: SameSite=Strict|Lax|None, Secure, HttpOnly, Partitioned (semicolon-separated). Note: SameSite=None and Partitioned require Secure.
     */
    #[JsonProperty('sticky_session_cookie_attributes')]
    public ?string $stickySessionCookieAttributes;

    /**
     * @var ?bool $tlsEnabled Enables TLS between LB backend and member servers
     */
    #[JsonProperty('tls_enabled')]
    public ?bool $tlsEnabled;

    /**
     * @var ?bool $tlsVerify Enables CA verification on TLS backend connections
     */
    #[JsonProperty('tls_verify')]
    public ?bool $tlsVerify;

    /**
     * @var ?bool $tlsUseSystemCa Force Load Balancer to verify member certificates against system CA bundle
     */
    #[JsonProperty('tls_use_system_ca')]
    public ?bool $tlsUseSystemCa;

    /**
     * @var ?bool $http2Enabled Allows for HTTP2 connection via ALPN
     */
    #[JsonProperty('http2_enabled')]
    public ?bool $http2Enabled;

    /**
     * @param array{
     *   timeoutServer?: ?int,
     *   timeoutTunnel?: ?int,
     *   outboundProxyProtocol?: ?value-of<LoadBalancerProxyProtocolVersionOrDisabled>,
     *   healthCheckType?: ?value-of<LoadBalancerHealthCheckType>,
     *   healthCheckInterval?: ?int,
     *   healthCheckFall?: ?int,
     *   healthCheckRise?: ?int,
     *   healthCheckUrl?: ?string,
     *   healthCheckExpectedStatus?: ?int,
     *   healthCheckOnDown?: ?value-of<LoadBalancerChecksOnDown>,
     *   healthCheckTlsVerify?: ?bool,
     *   stickySessionCookieName?: ?string,
     *   stickySessionCookieAttributes?: ?string,
     *   tlsEnabled?: ?bool,
     *   tlsVerify?: ?bool,
     *   tlsUseSystemCa?: ?bool,
     *   http2Enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timeoutServer = $values['timeoutServer'] ?? null;
        $this->timeoutTunnel = $values['timeoutTunnel'] ?? null;
        $this->outboundProxyProtocol = $values['outboundProxyProtocol'] ?? null;
        $this->healthCheckType = $values['healthCheckType'] ?? null;
        $this->healthCheckInterval = $values['healthCheckInterval'] ?? null;
        $this->healthCheckFall = $values['healthCheckFall'] ?? null;
        $this->healthCheckRise = $values['healthCheckRise'] ?? null;
        $this->healthCheckUrl = $values['healthCheckUrl'] ?? null;
        $this->healthCheckExpectedStatus = $values['healthCheckExpectedStatus'] ?? null;
        $this->healthCheckOnDown = $values['healthCheckOnDown'] ?? null;
        $this->healthCheckTlsVerify = $values['healthCheckTlsVerify'] ?? null;
        $this->stickySessionCookieName = $values['stickySessionCookieName'] ?? null;
        $this->stickySessionCookieAttributes = $values['stickySessionCookieAttributes'] ?? null;
        $this->tlsEnabled = $values['tlsEnabled'] ?? null;
        $this->tlsVerify = $values['tlsVerify'] ?? null;
        $this->tlsUseSystemCa = $values['tlsUseSystemCa'] ?? null;
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
