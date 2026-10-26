<?php

namespace Upcloud\IpAddress\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\IpAddressIpReleasePolicy;

class BulkPatchIpAddressesRequestV13IpAddressesItem extends JsonSerializableType
{
    /**
     * @var string $address
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var int $mainAccountId
     */
    #[JsonProperty('main_account_id')]
    public int $mainAccountId;

    /**
     * @var int $delegatedToAccountId
     */
    #[JsonProperty('delegated_to_account_id')]
    public int $delegatedToAccountId;

    /**
     * @var value-of<IpAddressIpReleasePolicy> $releasePolicy
     */
    #[JsonProperty('release_policy')]
    public string $releasePolicy;

    /**
     * @param array{
     *   address: string,
     *   mainAccountId: int,
     *   delegatedToAccountId: int,
     *   releasePolicy: value-of<IpAddressIpReleasePolicy>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->mainAccountId = $values['mainAccountId'];
        $this->delegatedToAccountId = $values['delegatedToAccountId'];
        $this->releasePolicy = $values['releasePolicy'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
