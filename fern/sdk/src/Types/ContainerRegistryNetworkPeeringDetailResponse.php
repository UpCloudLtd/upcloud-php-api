<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryNetworkPeeringDetailResponse extends JsonSerializableType
{
    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $serviceUuid
     */
    #[JsonProperty('service_uuid')]
    public string $serviceUuid;

    /**
     * @var string $customerNetworkUuid
     */
    #[JsonProperty('customer_network_uuid')]
    public string $customerNetworkUuid;

    /**
     * @var string $customerNetworkCidr CIDR block of the customer network
     */
    #[JsonProperty('customer_network_cidr')]
    public string $customerNetworkCidr;

    /**
     * @var string $customerNetworkZone Availability zone of the customer network
     */
    #[JsonProperty('customer_network_zone')]
    public string $customerNetworkZone;

    /**
     * @var value-of<ContainerRegistryPeeringStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $statusMessage Detailed message about the peering status
     */
    #[JsonProperty('status_message')]
    public ?string $statusMessage;

    /**
     * @var ?string $privateHostname Private hostname for accessing the registry via peering
     */
    #[JsonProperty('private_hostname')]
    public ?string $privateHostname;

    /**
     * @var ?string $gatewayNetworkUuid
     */
    #[JsonProperty('gateway_network_uuid')]
    public ?string $gatewayNetworkUuid;

    /**
     * @var ?string $gatewayNetworkCidr CIDR block of the gateway network
     */
    #[JsonProperty('gateway_network_cidr')]
    public ?string $gatewayNetworkCidr;

    /**
     * @var DateTime $createdAt Timestamp when the peering was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the peering was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   uuid: string,
     *   serviceUuid: string,
     *   customerNetworkUuid: string,
     *   customerNetworkCidr: string,
     *   customerNetworkZone: string,
     *   status: value-of<ContainerRegistryPeeringStatus>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   statusMessage?: ?string,
     *   privateHostname?: ?string,
     *   gatewayNetworkUuid?: ?string,
     *   gatewayNetworkCidr?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->serviceUuid = $values['serviceUuid'];
        $this->customerNetworkUuid = $values['customerNetworkUuid'];
        $this->customerNetworkCidr = $values['customerNetworkCidr'];
        $this->customerNetworkZone = $values['customerNetworkZone'];
        $this->status = $values['status'];
        $this->statusMessage = $values['statusMessage'] ?? null;
        $this->privateHostname = $values['privateHostname'] ?? null;
        $this->gatewayNetworkUuid = $values['gatewayNetworkUuid'] ?? null;
        $this->gatewayNetworkCidr = $values['gatewayNetworkCidr'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
