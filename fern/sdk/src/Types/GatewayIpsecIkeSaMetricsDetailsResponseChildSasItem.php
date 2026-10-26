<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

class GatewayIpsecIkeSaMetricsDetailsResponseChildSasItem extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the child SA
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $tunnelId
     */
    #[JsonProperty('tunnel_id')]
    public ?int $tunnelId;

    /**
     * @var ?string $uniqueId Unique ID of the child SA
     */
    #[JsonProperty('unique_id')]
    public ?string $uniqueId;

    /**
     * @var ?value-of<GatewayIpsecIkeSaMetricsDetailsResponseChildSasItemState> $state Operational state of the child SA
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $spiIn
     */
    #[JsonProperty('spi_in')]
    public ?string $spiIn;

    /**
     * @var ?string $spiOut
     */
    #[JsonProperty('spi_out')]
    public ?string $spiOut;

    /**
     * @var ?int $bytesIn
     */
    #[JsonProperty('bytes_in')]
    public ?int $bytesIn;

    /**
     * @var ?int $bytesOut
     */
    #[JsonProperty('bytes_out')]
    public ?int $bytesOut;

    /**
     * @var ?int $packetsIn
     */
    #[JsonProperty('packets_in')]
    public ?int $packetsIn;

    /**
     * @var ?int $packetsOut
     */
    #[JsonProperty('packets_out')]
    public ?int $packetsOut;

    /**
     * @var ?int $rekeyTime
     */
    #[JsonProperty('rekey_time')]
    public ?int $rekeyTime;

    /**
     * @var ?int $lifeTime
     */
    #[JsonProperty('life_time')]
    public ?int $lifeTime;

    /**
     * @var ?int $installTime
     */
    #[JsonProperty('install_time')]
    public ?int $installTime;

    /**
     * @var ?array<string> $localTrafficSelector
     */
    #[JsonProperty('local_traffic_selector'), ArrayType(['string'])]
    public ?array $localTrafficSelector;

    /**
     * @var ?array<string> $remoteTrafficSelector
     */
    #[JsonProperty('remote_traffic_selector'), ArrayType(['string'])]
    public ?array $remoteTrafficSelector;

    /**
     * @var ?DateTime $createdAt Timestamp of when the child SA was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the child SA was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   name?: ?string,
     *   tunnelId?: ?int,
     *   uniqueId?: ?string,
     *   state?: ?value-of<GatewayIpsecIkeSaMetricsDetailsResponseChildSasItemState>,
     *   spiIn?: ?string,
     *   spiOut?: ?string,
     *   bytesIn?: ?int,
     *   bytesOut?: ?int,
     *   packetsIn?: ?int,
     *   packetsOut?: ?int,
     *   rekeyTime?: ?int,
     *   lifeTime?: ?int,
     *   installTime?: ?int,
     *   localTrafficSelector?: ?array<string>,
     *   remoteTrafficSelector?: ?array<string>,
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
        $this->state = $values['state'] ?? null;
        $this->spiIn = $values['spiIn'] ?? null;
        $this->spiOut = $values['spiOut'] ?? null;
        $this->bytesIn = $values['bytesIn'] ?? null;
        $this->bytesOut = $values['bytesOut'] ?? null;
        $this->packetsIn = $values['packetsIn'] ?? null;
        $this->packetsOut = $values['packetsOut'] ?? null;
        $this->rekeyTime = $values['rekeyTime'] ?? null;
        $this->lifeTime = $values['lifeTime'] ?? null;
        $this->installTime = $values['installTime'] ?? null;
        $this->localTrafficSelector = $values['localTrafficSelector'] ?? null;
        $this->remoteTrafficSelector = $values['remoteTrafficSelector'] ?? null;
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
