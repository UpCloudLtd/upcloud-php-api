<?php

namespace Upcloud\ContainerRegistry\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Patch the typed config block. Omit inner fields to keep their current value.
 */
class ContainerRegistryServiceModifyProperties extends JsonSerializableType
{
    /**
     * @var ?bool $anonymousPullsAllowed Toggle unauthenticated read-only pulls. Triggers a zot configmap regen + pod restart.
     */
    #[JsonProperty('anonymous_pulls_allowed')]
    public ?bool $anonymousPullsAllowed;

    /**
     * @param array{
     *   anonymousPullsAllowed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->anonymousPullsAllowed = $values['anonymousPullsAllowed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
