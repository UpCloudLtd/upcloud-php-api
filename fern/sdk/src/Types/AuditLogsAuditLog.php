<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * A single audit log event
 */
class AuditLogsAuditLog extends JsonSerializableType
{
    /**
     * @var DateTime $time Timestamp of the event
     */
    #[JsonProperty('time'), Date(Date::TYPE_DATETIME)]
    public DateTime $time;

    /**
     * @var string $authType Authentication type used (e.g., 'gui', 'api', 'basic_auth')
     */
    #[JsonProperty('auth_type')]
    public string $authType;

    /**
     * @var string $cloudEventId Cloud event ID in ULID format
     */
    #[JsonProperty('cloud_event_id')]
    public string $cloudEventId;

    /**
     * @var string $upcloudCorrelationId UpCloud correlation ID for request tracing
     */
    #[JsonProperty('upcloud_correlation_id')]
    public string $upcloudCorrelationId;

    /**
     * @var value-of<AuditLogsAuditLogResourceType> $resourceType Type of resource affected
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var ?string $resourceSubType Subtype of resource affected (e.g., 'session-api-token')
     */
    #[JsonProperty('resource_sub_type')]
    public ?string $resourceSubType;

    /**
     * @var value-of<AuditLogsAuditLogAction> $action Action performed
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var value-of<AuditLogsAuditLogOrigin> $origin Origin of the request
     */
    #[JsonProperty('origin')]
    public string $origin;

    /**
     * @var string $accountUsername Username that performed the action
     */
    #[JsonProperty('account_username')]
    public string $accountUsername;

    /**
     * @var ?string $ipAddress IP address of the request origin (IPv4 or IPv6). May be masked for internal UpCloud services.
     */
    #[JsonProperty('ip_address')]
    public ?string $ipAddress;

    /**
     * @var ?string $resourceId ID of the affected resource. May be hidden for sensitive resources like auth and account.
     */
    #[JsonProperty('resource_id')]
    public ?string $resourceId;

    /**
     * @var ?array<string, mixed> $currentState Current state of the resource after the action (only present for create/update actions). Structure varies by resource_type.
     */
    #[JsonProperty('current_state'), ArrayType(['string' => 'mixed'])]
    public ?array $currentState;

    /**
     * @var ?array<string, mixed> $previousState Previous state of the resource before the action (only present for update/delete actions). Structure varies by resource_type.
     */
    #[JsonProperty('previous_state'), ArrayType(['string' => 'mixed'])]
    public ?array $previousState;

    /**
     * @param array{
     *   time: DateTime,
     *   authType: string,
     *   cloudEventId: string,
     *   upcloudCorrelationId: string,
     *   resourceType: value-of<AuditLogsAuditLogResourceType>,
     *   action: value-of<AuditLogsAuditLogAction>,
     *   origin: value-of<AuditLogsAuditLogOrigin>,
     *   accountUsername: string,
     *   resourceSubType?: ?string,
     *   ipAddress?: ?string,
     *   resourceId?: ?string,
     *   currentState?: ?array<string, mixed>,
     *   previousState?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->time = $values['time'];
        $this->authType = $values['authType'];
        $this->cloudEventId = $values['cloudEventId'];
        $this->upcloudCorrelationId = $values['upcloudCorrelationId'];
        $this->resourceType = $values['resourceType'];
        $this->resourceSubType = $values['resourceSubType'] ?? null;
        $this->action = $values['action'];
        $this->origin = $values['origin'];
        $this->accountUsername = $values['accountUsername'];
        $this->ipAddress = $values['ipAddress'] ?? null;
        $this->resourceId = $values['resourceId'] ?? null;
        $this->currentState = $values['currentState'] ?? null;
        $this->previousState = $values['previousState'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
