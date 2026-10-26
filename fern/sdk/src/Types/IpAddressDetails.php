<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Details of an IP address
 */
class IpAddressDetails extends JsonSerializableType
{
    /**
     * @var value-of<IpAddressNetworkType> $access
     */
    #[JsonProperty('access')]
    public string $access;

    /**
     * @var ?int $accountId
     */
    #[JsonProperty('account_id')]
    public ?int $accountId;

    /**
     * @var string $address
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var ?int $delegatedToAccountId
     */
    #[JsonProperty('delegated_to_account_id')]
    public ?int $delegatedToAccountId;

    /**
     * @var ?value-of<IpAddressIpFamily> $family
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?value-of<IpAddressBooleanYesno> $floating
     */
    #[JsonProperty('floating')]
    public ?string $floating;

    /**
     * @var ?string $mac
     */
    #[JsonProperty('mac')]
    public ?string $mac;

    /**
     * @var ?value-of<IpAddressBooleanYesno> $partOfPlan
     */
    #[JsonProperty('part_of_plan')]
    public ?string $partOfPlan;

    /**
     * @var ?string $ptrRecord
     */
    #[JsonProperty('ptr_record')]
    public ?string $ptrRecord;

    /**
     * @var ?value-of<IpAddressIpReleasePolicy> $releasePolicy
     */
    #[JsonProperty('release_policy')]
    public ?string $releasePolicy;

    /**
     * @var ?string $server
     */
    #[JsonProperty('server')]
    public ?string $server;

    /**
     * @var ?string $zone
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @param array{
     *   access: value-of<IpAddressNetworkType>,
     *   address: string,
     *   accountId?: ?int,
     *   delegatedToAccountId?: ?int,
     *   family?: ?value-of<IpAddressIpFamily>,
     *   floating?: ?value-of<IpAddressBooleanYesno>,
     *   mac?: ?string,
     *   partOfPlan?: ?value-of<IpAddressBooleanYesno>,
     *   ptrRecord?: ?string,
     *   releasePolicy?: ?value-of<IpAddressIpReleasePolicy>,
     *   server?: ?string,
     *   zone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->access = $values['access'];
        $this->accountId = $values['accountId'] ?? null;
        $this->address = $values['address'];
        $this->delegatedToAccountId = $values['delegatedToAccountId'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->floating = $values['floating'] ?? null;
        $this->mac = $values['mac'] ?? null;
        $this->partOfPlan = $values['partOfPlan'] ?? null;
        $this->ptrRecord = $values['ptrRecord'] ?? null;
        $this->releasePolicy = $values['releasePolicy'] ?? null;
        $this->server = $values['server'] ?? null;
        $this->zone = $values['zone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
