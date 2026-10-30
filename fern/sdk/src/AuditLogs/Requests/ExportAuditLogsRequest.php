<?php

namespace Upcloud\AuditLogs\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\AuditLogsFormatParameter;

class ExportAuditLogsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<AuditLogsFormatParameter> $format Export format: 'csv' or 'json' (default: csv)
     */
    public ?string $format;

    /**
     * @param array{
     *   format?: ?value-of<AuditLogsFormatParameter>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->format = $values['format'] ?? null;
    }
}
