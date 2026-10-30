<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Backups associated with this storage resource.
 */
class StorageDetailsBackups extends JsonSerializableType
{
    /**
     * @var array<string> $backup UUIDs of backups associated with this storage resource.
     */
    #[JsonProperty('backup'), ArrayType(['string'])]
    public array $backup;

    /**
     * @param array{
     *   backup: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->backup = $values['backup'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
