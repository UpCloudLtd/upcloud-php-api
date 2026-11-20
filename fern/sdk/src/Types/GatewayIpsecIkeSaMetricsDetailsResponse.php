<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for IPsec IKE SA metrics details.
 */
class GatewayIpsecIkeSaMetricsDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?array<GatewayIpsecMetricsIkeSaDetailsResponse> $ikeSas List of IKE SAs
     */
    #[JsonProperty('ike_sas'), ArrayType([GatewayIpsecMetricsIkeSaDetailsResponse::class])]
    public ?array $ikeSas;

    /**
     * @param array{
     *   ikeSas?: ?array<GatewayIpsecMetricsIkeSaDetailsResponse>,
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
