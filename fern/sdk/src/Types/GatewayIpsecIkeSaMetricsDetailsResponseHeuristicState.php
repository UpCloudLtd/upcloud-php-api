<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Heuristic state of the IKE SA
 */
class GatewayIpsecIkeSaMetricsDetailsResponseHeuristicState extends JsonSerializableType
{
    /**
     * @var ?bool $tunnelUp
     */
    #[JsonProperty('tunnel_up')]
    public ?bool $tunnelUp;

    /**
     * @var ?bool $tunnelHealthy
     */
    #[JsonProperty('tunnel_healthy')]
    public ?bool $tunnelHealthy;

    /**
     * @var ?string $lastDownMessage
     */
    #[JsonProperty('last_down_message')]
    public ?string $lastDownMessage;

    /**
     * @var ?DateTime $updatedAt Timestamp of when the heuristic state was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?DateTime $lastDownMessageUpdatedAt Timestamp of when the last down message was updated.
     */
    #[JsonProperty('last_down_message_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastDownMessageUpdatedAt;

    /**
     * @var ?int $upEvents Number of times the IKE SA has transitioned to up state
     */
    #[JsonProperty('up_events')]
    public ?int $upEvents;

    /**
     * @var ?int $downEvents Number of times the IKE SA has transitioned to down state
     */
    #[JsonProperty('down_events')]
    public ?int $downEvents;

    /**
     * @var ?int $logMessageBadEvents Number of times the IKE SA has logged a bad message
     */
    #[JsonProperty('log_message_bad_events')]
    public ?int $logMessageBadEvents;

    /**
     * @param array{
     *   tunnelUp?: ?bool,
     *   tunnelHealthy?: ?bool,
     *   lastDownMessage?: ?string,
     *   updatedAt?: ?DateTime,
     *   lastDownMessageUpdatedAt?: ?DateTime,
     *   upEvents?: ?int,
     *   downEvents?: ?int,
     *   logMessageBadEvents?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->tunnelUp = $values['tunnelUp'] ?? null;
        $this->tunnelHealthy = $values['tunnelHealthy'] ?? null;
        $this->lastDownMessage = $values['lastDownMessage'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->lastDownMessageUpdatedAt = $values['lastDownMessageUpdatedAt'] ?? null;
        $this->upEvents = $values['upEvents'] ?? null;
        $this->downEvents = $values['downEvents'] ?? null;
        $this->logMessageBadEvents = $values['logMessageBadEvents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
