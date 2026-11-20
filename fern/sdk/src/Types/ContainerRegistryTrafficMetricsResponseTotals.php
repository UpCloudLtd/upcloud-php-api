<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryTrafficMetricsResponseTotals extends JsonSerializableType
{
    /**
     * @var int $ingressBytes
     */
    #[JsonProperty('ingress_bytes')]
    public int $ingressBytes;

    /**
     * @var int $egressBytes
     */
    #[JsonProperty('egress_bytes')]
    public int $egressBytes;

    /**
     * @param array{
     *   ingressBytes: int,
     *   egressBytes: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ingressBytes = $values['ingressBytes'];
        $this->egressBytes = $values['egressBytes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
