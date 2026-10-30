<?php

namespace Upcloud\AuditLogs\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\AuditLogsActionsParameterItem;
use Upcloud\Types\AuditLogsOriginsParameterItem;
use Upcloud\Types\AuditLogsResourceTypesParameterItem;
use DateTime;

class ListAuditLogsRequest extends JsonSerializableType
{
    /**
     * @var ?string $q Filter audit logs using a keyword such as account username, resource ID or IP address.
     */
    public ?string $q;

    /**
     * @var ?int $limit Number of results to return (max 100, default 50)
     */
    public ?int $limit;

    /**
     * @var ?int $offset Offset for retrieved results. (default 0)
     */
    public ?int $offset;

    /**
     * @var ?array<value-of<AuditLogsActionsParameterItem>> $actions List of actions to filter by
     */
    public ?array $actions;

    /**
     * @var ?array<value-of<AuditLogsOriginsParameterItem>> $origins List of origins to filter by
     */
    public ?array $origins;

    /**
     * @var ?array<value-of<AuditLogsResourceTypesParameterItem>> $resourceTypes List of resource types to filter by
     */
    public ?array $resourceTypes;

    /**
     * @var ?DateTime $createdAfter List audit logs created after the given timestamp (including the time of timestamp). Format: ISO timestamp eg. 2024-01-01T23:45:56Z
     */
    public ?DateTime $createdAfter;

    /**
     * @var ?DateTime $createdBefore List audit logs created before the given timestamp (including the time of timestamp). Format: ISO timestamp eg. 2024-01-01T23:45:56Z
     */
    public ?DateTime $createdBefore;

    /**
     * @param array{
     *   q?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     *   actions?: ?array<value-of<AuditLogsActionsParameterItem>>,
     *   origins?: ?array<value-of<AuditLogsOriginsParameterItem>>,
     *   resourceTypes?: ?array<value-of<AuditLogsResourceTypesParameterItem>>,
     *   createdAfter?: ?DateTime,
     *   createdBefore?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->q = $values['q'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->actions = $values['actions'] ?? null;
        $this->origins = $values['origins'] ?? null;
        $this->resourceTypes = $values['resourceTypes'] ?? null;
        $this->createdAfter = $values['createdAfter'] ?? null;
        $this->createdBefore = $values['createdBefore'] ?? null;
    }
}
