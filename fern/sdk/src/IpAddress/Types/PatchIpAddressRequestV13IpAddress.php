<?php

namespace Upcloud\IpAddress\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\IpAddressIpReleasePolicy;

class PatchIpAddressRequestV13IpAddress extends JsonSerializableType
{
    /**
     * @var ?string $ptrRecord
     */
    #[JsonProperty('ptr_record')]
    public ?string $ptrRecord;

    /**
     * @var ?string $mac
     */
    #[JsonProperty('mac')]
    public ?string $mac;

    /**
     * @var ?value-of<IpAddressIpReleasePolicy> $releasePolicy
     */
    #[JsonProperty('release_policy')]
    public ?string $releasePolicy;

    /**
     * @param array{
     *   ptrRecord?: ?string,
     *   mac?: ?string,
     *   releasePolicy?: ?value-of<IpAddressIpReleasePolicy>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ptrRecord = $values['ptrRecord'] ?? null;
        $this->mac = $values['mac'] ?? null;
        $this->releasePolicy = $values['releasePolicy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
