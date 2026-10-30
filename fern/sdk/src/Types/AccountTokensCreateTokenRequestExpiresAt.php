<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class AccountTokensCreateTokenRequestExpiresAt extends JsonSerializableType
{
    /**
     * @var mixed $expiresAt
     */
    #[JsonProperty('expires_at')]
    public mixed $expiresAt;

    /**
     * @param array{
     *   expiresAt?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->expiresAt = $values['expiresAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
