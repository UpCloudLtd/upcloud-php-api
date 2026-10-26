<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for account CA
 */
class DatabaseAccountCaResponse extends JsonSerializableType
{
    /**
     * @var ?string $certificate Name of the CA
     */
    #[JsonProperty('certificate')]
    public ?string $certificate;

    /**
     * @param array{
     *   certificate?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->certificate = $values['certificate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
