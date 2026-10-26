<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Storage to load into the attached CD-ROM device.
 */
class ServerLoadCdromStorageDevice extends JsonSerializableType
{
    /**
     * @var string $storage
     */
    #[JsonProperty('storage')]
    public string $storage;

    /**
     * @param array{
     *   storage: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
