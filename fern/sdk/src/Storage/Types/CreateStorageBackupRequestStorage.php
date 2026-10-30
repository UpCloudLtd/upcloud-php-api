<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Parameters for the point-in-time backup.
 */
class CreateStorageBackupRequestStorage extends JsonSerializableType
{
    /**
     * @var string $title A short, informational description of the backup.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @param array{
     *   title: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
