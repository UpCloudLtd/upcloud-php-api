<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryServiceEventsResponseEventsItem extends JsonSerializableType
{
    /**
     * @var int $id Monotonically-increasing event ID.
     */
    #[JsonProperty('id')]
    public int $id;

    /**
     * @var string $eventId Stable opaque ID, prefix `aud_`.
     */
    #[JsonProperty('event_id')]
    public string $eventId;

    /**
     * @var DateTime $timestamp When the event was recorded.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public DateTime $timestamp;

    /**
     * @var string $action Event type, e.g. registry.tag.delete, user.create, auth.login.
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?string $actor Tenant user that triggered the event. Empty for service-account actions.
     */
    #[JsonProperty('actor')]
    public ?string $actor;

    /**
     * @var ?string $ipAddress Caller IP.
     */
    #[JsonProperty('ip_address')]
    public ?string $ipAddress;

    /**
     * @var ?string $userAgent Caller User-Agent.
     */
    #[JsonProperty('user_agent')]
    public ?string $userAgent;

    /**
     * @var ?string $resource Identifier of the affected resource (e.g. registry_tag:foo:v1).
     */
    #[JsonProperty('resource')]
    public ?string $resource;

    /**
     * @var value-of<ContainerRegistryServiceEventsResponseEventsItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $reason Optional explanation when status != success.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   id: int,
     *   eventId: string,
     *   timestamp: DateTime,
     *   action: string,
     *   status: value-of<ContainerRegistryServiceEventsResponseEventsItemStatus>,
     *   actor?: ?string,
     *   ipAddress?: ?string,
     *   userAgent?: ?string,
     *   resource?: ?string,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->eventId = $values['eventId'];
        $this->timestamp = $values['timestamp'];
        $this->action = $values['action'];
        $this->actor = $values['actor'] ?? null;
        $this->ipAddress = $values['ipAddress'] ?? null;
        $this->userAgent = $values['userAgent'] ?? null;
        $this->resource = $values['resource'] ?? null;
        $this->status = $values['status'];
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
