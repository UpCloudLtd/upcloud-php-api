<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Available filter options for audit logs
 */
class AuditLogsFilterOptionsResponse extends JsonSerializableType
{
    /**
     * @var array<value-of<AuditLogsFilterOptionsResponseResourceTypesItem>> $resourceTypes List of available resource types
     */
    #[JsonProperty('resource_types'), ArrayType(['string'])]
    public array $resourceTypes;

    /**
     * @var array<value-of<AuditLogsFilterOptionsResponseActionsItem>> $actions List of available actions
     */
    #[JsonProperty('actions'), ArrayType(['string'])]
    public array $actions;

    /**
     * @var array<value-of<AuditLogsFilterOptionsResponseOriginsItem>> $origins List of available origins
     */
    #[JsonProperty('origins'), ArrayType(['string'])]
    public array $origins;

    /**
     * @param array{
     *   resourceTypes: array<value-of<AuditLogsFilterOptionsResponseResourceTypesItem>>,
     *   actions: array<value-of<AuditLogsFilterOptionsResponseActionsItem>>,
     *   origins: array<value-of<AuditLogsFilterOptionsResponseOriginsItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceTypes = $values['resourceTypes'];
        $this->actions = $values['actions'];
        $this->origins = $values['origins'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
