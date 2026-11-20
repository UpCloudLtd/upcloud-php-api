<?php

namespace Upcloud\ContainerRegistry\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Customer-facing typed config block. Feature toggles land here as they ship; mirrors the same object returned by GET.
 */
class ContainerRegistryServiceCreateProperties extends JsonSerializableType
{
    /**
     * @var ?bool $anonymousPullsAllowed Allow unauthenticated docker pulls. Pushes always require htpasswd auth. Defaults to false.
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
