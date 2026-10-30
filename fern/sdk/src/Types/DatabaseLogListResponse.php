<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema representing a paginated list of log entries from UpCloud services.
 */
class DatabaseLogListResponse extends JsonSerializableType
{
    /**
     * @var ?string $firstLogOffset Offset of the first log entry in the list.
     */
    #[JsonProperty('first_log_offset')]
    public ?string $firstLogOffset;

    /**
     * @var ?string $offset Current offset for pagination.
     */
    #[JsonProperty('offset')]
    public ?string $offset;

    /**
     * @var ?array<DatabaseLogEntryResponse> $logs Array of log entries from UpCloud services.
     */
    #[JsonProperty('logs'), ArrayType([DatabaseLogEntryResponse::class])]
    public ?array $logs;

    /**
     * @param array{
     *   firstLogOffset?: ?string,
     *   offset?: ?string,
     *   logs?: ?array<DatabaseLogEntryResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->firstLogOffset = $values['firstLogOffset'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->logs = $values['logs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
