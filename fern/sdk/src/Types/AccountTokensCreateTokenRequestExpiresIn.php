<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class AccountTokensCreateTokenRequestExpiresIn extends JsonSerializableType
{
    /**
     * @var mixed $expiresIn
     */
    #[JsonProperty('expires_in')]
    public mixed $expiresIn;

    /**
     * @param array{
     *   expiresIn?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->expiresIn = $values['expiresIn'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
