<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * List of services this network is joined to
 */
class NetworkDetailsServices extends JsonSerializableType
{
    /**
     * @var array<NetworkDetailsServicesServiceItem> $service
     */
    #[JsonProperty('service'), ArrayType([NetworkDetailsServicesServiceItem::class])]
    public array $service;

    /**
     * @param array{
     *   service: array<NetworkDetailsServicesServiceItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->service = $values['service'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
