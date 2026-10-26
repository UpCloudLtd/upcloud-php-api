<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Maps a user attribute from either a JWT claim (optionally prefixed) or a CEL expression. Claim and expression are mutually exclusive.
 */
class KubernetesPrefixedClaimOrExpression extends JsonSerializableType
{
    /**
     * @var ?string $claim JWT claim to use. Mutually exclusive with expression.
     */
    #[JsonProperty('claim')]
    public ?string $claim;

    /**
     * @var ?string $prefix Prefix prepended to the claim's value. Must be set (may be empty) when claim is set. Mutually exclusive with expression.
     */
    #[JsonProperty('prefix')]
    public ?string $prefix;

    /**
     * @var ?string $expression CEL expression producing the attribute value. Mutually exclusive with claim and prefix.
     */
    #[JsonProperty('expression')]
    public ?string $expression;

    /**
     * @param array{
     *   claim?: ?string,
     *   prefix?: ?string,
     *   expression?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->claim = $values['claim'] ?? null;
        $this->prefix = $values['prefix'] ?? null;
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
