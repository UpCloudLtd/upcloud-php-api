<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceTaskCreateUpgradeCheck extends JsonSerializableType
{
    /**
     * @var string $targetVersion The target major version for the upgrade check.
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
