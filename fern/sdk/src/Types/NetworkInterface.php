<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for listing network interfaces
 */
class NetworkInterface extends JsonSerializableType
{
    /**
     * @var value-of<NetworkBooleanYesno> $bootable
     */
    #[JsonProperty('bootable')]
    public string $bootable;

    /**
     * @var array<array<string, mixed>> $ipAddresses
     */
    #[JsonProperty('ip_addresses'), ArrayType([['string' => 'mixed']])]
    public array $ipAddresses;

    /**
     * @var string $mac
     */
    #[JsonProperty('mac')]
    public string $mac;

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
     * @var ?string $server
     */
    #[JsonProperty('server')]
    public ?string $server;

    /**
     * @var value-of<NetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @param array{
     *   bootable: value-of<NetworkBooleanYesno>,
     *   ipAddresses: array<array<string, mixed>>,
     *   mac: string,
     *   network: string,
     *   sourceIpFiltering: value-of<NetworkBooleanYesno>,
     *   type: value-of<NetworkType>,
     *   uuid: string,
     *   server?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bootable = $values['bootable'];
        $this->ipAddresses = $values['ipAddresses'];
        $this->mac = $values['mac'];
        $this->network = $values['network'];
        $this->sourceIpFiltering = $values['sourceIpFiltering'];
        $this->server = $values['server'] ?? null;
        $this->type = $values['type'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
