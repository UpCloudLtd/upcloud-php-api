<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for service metrics.
 */
class GatewayServiceMetricsResponse extends JsonSerializableType
{
    /**
     * @var ?array<GatewayMetricsDetailsResponse> $gateways
     */
    #[JsonProperty('gateways'), ArrayType([GatewayMetricsDetailsResponse::class])]
    public ?array $gateways;

    /**
     * @var ?GatewayIpsecMetricsDetailsResponse $ipsecMetrics
     */
    #[JsonProperty('ipsec_metrics')]
    public ?GatewayIpsecMetricsDetailsResponse $ipsecMetrics;

    /**
     * @param array{
     *   gateways?: ?array<GatewayMetricsDetailsResponse>,
     *   ipsecMetrics?: ?GatewayIpsecMetricsDetailsResponse,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->gateways = $values['gateways'] ?? null;
        $this->ipsecMetrics = $values['ipsecMetrics'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
