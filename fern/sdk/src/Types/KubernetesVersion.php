<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Kubernetes version
 */
class KubernetesVersion extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $version Kubernetes semantic version
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @var ?DateTime $deprecatedAt Time (UTC) after which new clusters can no longer be created with this version. Omitted if the version is not scheduled for deprecation.
     */
    #[JsonProperty('deprecated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deprecatedAt;

    /**
     * @param array{
     *   id: string,
     *   version: string,
     *   deprecatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->version = $values['version'];
        $this->deprecatedAt = $values['deprecatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
