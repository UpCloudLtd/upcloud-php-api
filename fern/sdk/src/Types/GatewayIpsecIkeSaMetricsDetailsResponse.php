<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for IPsec IKE SA metrics details.
 */
class GatewayIpsecIkeSaMetricsDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the gateway
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $tunnelId ID of the tunnel
     */
    #[JsonProperty('tunnel_id')]
    public ?int $tunnelId;

    /**
     * @var ?string $uniqueId Unique ID of the IKE SA
     */
    #[JsonProperty('unique_id')]
    public ?string $uniqueId;

    /**
     * @var ?int $version Version of the IKE SA
     */
    #[JsonProperty('version')]
    public ?int $version;

    /**
     * @var ?value-of<GatewayIpsecIkeSaMetricsDetailsResponseOperationalState> $operationalState Operational state of the IKE SA
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?value-of<GatewayIpsecIkeSaMetricsDetailsResponseInternalState> $internalState Internal state of the IKE SA
     */
    #[JsonProperty('internal_state')]
    public ?string $internalState;

    /**
     * @var ?bool $initator Whether the local gateway is the initiator of the IKE SA
     */
    #[JsonProperty('initator')]
    public ?bool $initator;

    /**
     * @var ?int $established
     */
    #[JsonProperty('established')]
    public ?int $established;

    /**
     * @var ?int $rekeyTime
     */
    #[JsonProperty('rekey_time')]
    public ?int $rekeyTime;

    /**
     * @var ?int $reauthTime
     */
    #[JsonProperty('reauth_time')]
    public ?int $reauthTime;

    /**
     * @var ?array<GatewayIpsecIkeSaMetricsDetailsResponseChildSasItem> $childSas
     */
    #[JsonProperty('child_sas'), ArrayType([GatewayIpsecIkeSaMetricsDetailsResponseChildSasItem::class])]
    public ?array $childSas;

    /**
     * @var ?string $localHost Local host IP address
     */
    #[JsonProperty('local_host')]
    public ?string $localHost;

    /**
     * @var ?string $remoteHost Remote host IP address
     */
    #[JsonProperty('remote_host')]
    public ?string $remoteHost;

    /**
     * @var ?string $localId Local IKE identity
     */
    #[JsonProperty('local_id')]
    public ?string $localId;

    /**
     * @var ?string $remoteId Remote IKE identity
     */
    #[JsonProperty('remote_id')]
    public ?string $remoteId;

    /**
     * @var ?GatewayIpsecIkeSaMetricsDetailsResponseHeuristicState $heuristicState Heuristic state of the IKE SA
     */
    #[JsonProperty('heuristic_state')]
    public ?GatewayIpsecIkeSaMetricsDetailsResponseHeuristicState $heuristicState;

    /**
     * @var ?DateTime $createdAt Timestamp of when the IKE SA was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the IKE SA was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   name?: ?string,
     *   tunnelId?: ?int,
     *   uniqueId?: ?string,
     *   version?: ?int,
     *   operationalState?: ?value-of<GatewayIpsecIkeSaMetricsDetailsResponseOperationalState>,
     *   internalState?: ?value-of<GatewayIpsecIkeSaMetricsDetailsResponseInternalState>,
     *   initator?: ?bool,
     *   established?: ?int,
     *   rekeyTime?: ?int,
     *   reauthTime?: ?int,
     *   childSas?: ?array<GatewayIpsecIkeSaMetricsDetailsResponseChildSasItem>,
     *   localHost?: ?string,
     *   remoteHost?: ?string,
     *   localId?: ?string,
     *   remoteId?: ?string,
     *   heuristicState?: ?GatewayIpsecIkeSaMetricsDetailsResponseHeuristicState,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->tunnelId = $values['tunnelId'] ?? null;
        $this->uniqueId = $values['uniqueId'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->operationalState = $values['operationalState'] ?? null;
        $this->internalState = $values['internalState'] ?? null;
        $this->initator = $values['initator'] ?? null;
        $this->established = $values['established'] ?? null;
        $this->rekeyTime = $values['rekeyTime'] ?? null;
        $this->reauthTime = $values['reauthTime'] ?? null;
        $this->childSas = $values['childSas'] ?? null;
        $this->localHost = $values['localHost'] ?? null;
        $this->remoteHost = $values['remoteHost'] ?? null;
        $this->localId = $values['localId'] ?? null;
        $this->remoteId = $values['remoteId'] ?? null;
        $this->heuristicState = $values['heuristicState'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
