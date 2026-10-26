<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class KubernetesClusterAvailableUpgrades extends JsonSerializableType
{
    /**
     * @var array<string> $versions
     */
    #[JsonProperty('versions'), ArrayType(['string'])]
    public array $versions;

    /**
     * @param array{
     *   versions: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->versions = $values['versions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
