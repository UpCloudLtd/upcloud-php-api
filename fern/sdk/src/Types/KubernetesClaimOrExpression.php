<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Maps a user attribute from either a JWT claim or a CEL expression. Claim and expression are mutually exclusive.
 */
class KubernetesClaimOrExpression extends JsonSerializableType
{
    /**
     * @var ?string $claim JWT claim to use. Mutually exclusive with expression.
     */
    #[JsonProperty('claim')]
    public ?string $claim;

    /**
     * @var ?string $expression CEL expression producing the attribute value. Mutually exclusive with claim.
     */
    #[JsonProperty('expression')]
    public ?string $expression;

    /**
     * @param array{
     *   claim?: ?string,
     *   expression?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->claim = $values['claim'] ?? null;
        $this->expression = $values['expression'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
