<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceUpgrade extends JsonSerializableType
{
    /**
     * @var string $targetVersion Version to upgrade the service
     */
    #[JsonProperty('target_version')]
    public string $targetVersion;

    /**
     * @param array{
     *   targetVersion: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->targetVersion = $values['targetVersion'];
    }
}
