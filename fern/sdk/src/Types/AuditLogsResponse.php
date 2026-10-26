<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for a list of audit logs
 */
class AuditLogsResponse extends JsonSerializableType
{
    /**
     * @var array<AuditLogsAuditLog> $auditLogs List of audit log events
     */
    #[JsonProperty('audit_logs'), ArrayType([AuditLogsAuditLog::class])]
    public array $auditLogs;

    /**
     * @param array{
     *   auditLogs: array<AuditLogsAuditLog>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->auditLogs = $values['auditLogs'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
