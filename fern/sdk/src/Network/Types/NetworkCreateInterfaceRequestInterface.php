<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkBooleanYesno;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\NetworkType;
use Upcloud\Core\Types\ArrayType;

class NetworkCreateInterfaceRequestInterface extends JsonSerializableType
{
    /**
     * @var value-of<NetworkBooleanYesno> $bootable
     */
    #[JsonProperty('bootable')]
    public string $bootable;

    /**
     * @var string $network
     */
    #[JsonProperty('network')]
    public string $network;

    /**
     * @var value-of<NetworkBooleanYesno> $sourceIpFiltering
     */
    #[JsonProperty('source_ip_filtering')]
    public string $sourceIpFiltering;

    /**
     * @var value-of<NetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?array<NetworkCreateInterfaceRequestInterfaceLabelsItem> $labels
     */
    #[JsonProperty('labels'), ArrayType([NetworkCreateInterfaceRequestInterfaceLabelsItem::class])]
    public ?array $labels;

    /**
     * @param array{
     *   bootable: value-of<NetworkBooleanYesno>,
     *   network: string,
     *   sourceIpFiltering: value-of<NetworkBooleanYesno>,
     *   type: value-of<NetworkType>,
     *   labels?: ?array<NetworkCreateInterfaceRequestInterfaceLabelsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bootable = $values['bootable'];
        $this->network = $values['network'];
        $this->sourceIpFiltering = $values['sourceIpFiltering'];
        $this->type = $values['type'];
        $this->labels = $values['labels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
