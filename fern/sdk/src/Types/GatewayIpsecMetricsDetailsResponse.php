<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for IPsec IKE SA metrics details.
 */
class GatewayIpsecMetricsDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?array<GatewayIpsecIkeSaMetricsDetailsResponse> $ikeSas List of IKE SAs
     */
    #[JsonProperty('ike_sas'), ArrayType([GatewayIpsecIkeSaMetricsDetailsResponse::class])]
    public ?array $ikeSas;

    /**
     * @param array{
     *   ikeSas?: ?array<GatewayIpsecIkeSaMetricsDetailsResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ikeSas = $values['ikeSas'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
