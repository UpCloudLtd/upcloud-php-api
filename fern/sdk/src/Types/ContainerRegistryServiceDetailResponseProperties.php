<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Customer-facing service configuration.
 */
class ContainerRegistryServiceDetailResponseProperties extends JsonSerializableType
{
    /**
     * @var ?bool $anonymousPullsAllowed Allow anonymous image pulls without authentication
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
