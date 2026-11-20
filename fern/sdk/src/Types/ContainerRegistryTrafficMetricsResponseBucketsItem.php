<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

class ContainerRegistryTrafficMetricsResponseBucketsItem extends JsonSerializableType
{
    /**
     * @var DateTime $timestamp
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public DateTime $timestamp;

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
     *   timestamp: DateTime,
     *   ingressBytes: int,
     *   egressBytes: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timestamp = $values['timestamp'];
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
