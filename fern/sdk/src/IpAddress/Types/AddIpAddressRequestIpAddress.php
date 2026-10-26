<?php

namespace Upcloud\IpAddress\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\IpAddressIpFamily;
use Upcloud\Types\IpAddressBooleanYesno;
use Upcloud\Types\IpAddressIpReleasePolicy;

class AddIpAddressRequestIpAddress extends JsonSerializableType
{
    /**
     * @var string $access
     */
    #[JsonProperty('access')]
    public string $access;

    /**
     * @var value-of<IpAddressIpFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

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
     * @var ?string $prefix
     */
    #[JsonProperty('prefix')]
    public ?string $prefix;

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
     * @var ?string $vlanId
     */
    #[JsonProperty('vlan_id')]
    public ?string $vlanId;

    /**
     * @var ?string $zone
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @param array{
     *   access: string,
     *   family: value-of<IpAddressIpFamily>,
     *   floating?: ?value-of<IpAddressBooleanYesno>,
     *   mac?: ?string,
     *   prefix?: ?string,
     *   releasePolicy?: ?value-of<IpAddressIpReleasePolicy>,
     *   server?: ?string,
     *   vlanId?: ?string,
     *   zone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->access = $values['access'];
        $this->family = $values['family'];
        $this->floating = $values['floating'] ?? null;
        $this->mac = $values['mac'] ?? null;
        $this->prefix = $values['prefix'] ?? null;
        $this->releasePolicy = $values['releasePolicy'] ?? null;
        $this->server = $values['server'] ?? null;
        $this->vlanId = $values['vlanId'] ?? null;
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
