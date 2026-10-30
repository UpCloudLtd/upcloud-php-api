<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 409 Conflict errors for partner account creation.
 */
class PartnerError409 extends JsonSerializableType
{
    /**
     * @var PartnerError409Error $error
     */
    #[JsonProperty('error')]
    public PartnerError409Error $error;

    /**
     * @param array{
     *   error: PartnerError409Error,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
