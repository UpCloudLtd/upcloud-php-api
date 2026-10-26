<?php

namespace Upcloud\IpAddress\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\IpAddressBooleanYesno;
use Upcloud\Core\Json\JsonProperty;

class ModifyIpAddressRequestV10IpAddress extends JsonSerializableType
{
    /**
     * @var ?value-of<IpAddressBooleanYesno> $floating
     */
    #[JsonProperty('floating')]
    public ?string $floating;

    /**
     * @var string $ptrRecord
     */
    #[JsonProperty('ptr_record')]
    public string $ptrRecord;

    /**
     * @var ?string $vlanId
     */
    #[JsonProperty('vlan_id')]
    public ?string $vlanId;

    /**
     * @param array{
     *   ptrRecord: string,
     *   floating?: ?value-of<IpAddressBooleanYesno>,
     *   vlanId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->floating = $values['floating'] ?? null;
        $this->ptrRecord = $values['ptrRecord'];
        $this->vlanId = $values['vlanId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
