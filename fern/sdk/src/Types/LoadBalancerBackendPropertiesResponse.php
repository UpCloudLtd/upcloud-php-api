<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Properties of a backend configuration.
 */
class LoadBalancerBackendPropertiesResponse extends JsonSerializableType
{
    /**
     * @var int $backendId Identifier of the backend.
     */
    #[JsonProperty('backend_id')]
    public int $backendId;

    /**
     * @var ?value-of<LoadBalancerProxyProtocolVersionOrDisabled> $outboundProxyProtocol
     */
    #[JsonProperty('outbound_proxy_protocol')]
    public ?string $outboundProxyProtocol;

    /**
     * @var int $timeoutServer Server timeout in milliseconds.
     */
    #[JsonProperty('timeout_server')]
    public int $timeoutServer;

    /**
     * @var int $timeoutTunnel Tunnel timeout in milliseconds.
     */
    #[JsonProperty('timeout_tunnel')]
    public int $timeoutTunnel;

    /**
     * @var string $healthCheckType Type of health check.
     */
    #[JsonProperty('health_check_type')]
    public string $healthCheckType;

    /**
     * @var int $healthCheckInterval Interval between health checks in seconds.
     */
    #[JsonProperty('health_check_interval')]
    public int $healthCheckInterval;

    /**
     * @var int $healthCheckFall Number of failed checks before marking as unhealthy.
     */
    #[JsonProperty('health_check_fall')]
    public int $healthCheckFall;

    /**
     * @var int $healthCheckRise Number of successful checks before marking as healthy.
     */
    #[JsonProperty('health_check_rise')]
    public int $healthCheckRise;

    /**
     * @var string $healthCheckUrl URL for HTTP health checks.
     */
    #[JsonProperty('health_check_url')]
    public string $healthCheckUrl;

    /**
     * @var int $healthCheckExpectedStatus Expected HTTP status code from health check.
     */
    #[JsonProperty('health_check_expected_status')]
    public int $healthCheckExpectedStatus;

    /**
     * @var bool $healthCheckTlsVerify Whether to verify TLS in health check.
     */
    #[JsonProperty('health_check_tls_verify')]
    public bool $healthCheckTlsVerify;

    /**
     * @var string $healthCheckOnDown Action to take when backend is down.
     */
    #[JsonProperty('health_check_on_down')]
    public string $healthCheckOnDown;

    /**
     * @var ?string $stickySessionCookieName Name of the sticky session cookie.
     */
    #[JsonProperty('sticky_session_cookie_name')]
    public ?string $stickySessionCookieName;

    /**
     * @var ?string $stickySessionCookieAttributes Additional cookie attributes appended to sticky session cookies. Supports combinations of: SameSite=Strict|Lax|None, Secure, HttpOnly, Partitioned (semicolon-separated).
     */
    #[JsonProperty('sticky_session_cookie_attributes')]
    public ?string $stickySessionCookieAttributes;

    /**
     * @var bool $tlsEnabled Whether TLS is enabled.
     */
    #[JsonProperty('tls_enabled')]
    public bool $tlsEnabled;

    /**
     * @var bool $tlsVerify Whether to verify backend TLS certificate.
     */
    #[JsonProperty('tls_verify')]
    public bool $tlsVerify;

    /**
     * @var bool $tlsUseSystemCa Whether to use system CA for backend TLS.
     */
    #[JsonProperty('tls_use_system_ca')]
    public bool $tlsUseSystemCa;

    /**
     * @var bool $http2Enabled Whether HTTP/2 is enabled for the backend.
     */
    #[JsonProperty('http2_enabled')]
    public bool $http2Enabled;

    /**
     * @param array{
     *   backendId: int,
     *   timeoutServer: int,
     *   timeoutTunnel: int,
     *   healthCheckType: string,
     *   healthCheckInterval: int,
     *   healthCheckFall: int,
     *   healthCheckRise: int,
     *   healthCheckUrl: string,
     *   healthCheckExpectedStatus: int,
     *   healthCheckTlsVerify: bool,
     *   healthCheckOnDown: string,
     *   tlsEnabled: bool,
     *   tlsVerify: bool,
     *   tlsUseSystemCa: bool,
     *   http2Enabled: bool,
     *   outboundProxyProtocol?: ?value-of<LoadBalancerProxyProtocolVersionOrDisabled>,
     *   stickySessionCookieName?: ?string,
     *   stickySessionCookieAttributes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->backendId = $values['backendId'];
        $this->outboundProxyProtocol = $values['outboundProxyProtocol'] ?? null;
        $this->timeoutServer = $values['timeoutServer'];
        $this->timeoutTunnel = $values['timeoutTunnel'];
        $this->healthCheckType = $values['healthCheckType'];
        $this->healthCheckInterval = $values['healthCheckInterval'];
        $this->healthCheckFall = $values['healthCheckFall'];
        $this->healthCheckRise = $values['healthCheckRise'];
        $this->healthCheckUrl = $values['healthCheckUrl'];
        $this->healthCheckExpectedStatus = $values['healthCheckExpectedStatus'];
        $this->healthCheckTlsVerify = $values['healthCheckTlsVerify'];
        $this->healthCheckOnDown = $values['healthCheckOnDown'];
        $this->stickySessionCookieName = $values['stickySessionCookieName'] ?? null;
        $this->stickySessionCookieAttributes = $values['stickySessionCookieAttributes'] ?? null;
        $this->tlsEnabled = $values['tlsEnabled'];
        $this->tlsVerify = $values['tlsVerify'];
        $this->tlsUseSystemCa = $values['tlsUseSystemCa'];
        $this->http2Enabled = $values['http2Enabled'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
