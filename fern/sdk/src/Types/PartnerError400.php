<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 400 Bad Request errors for partner account creation.
 */
class PartnerError400 extends JsonSerializableType
{
    /**
     * @var PartnerError400Error $error
     */
    #[JsonProperty('error')]
    public PartnerError400Error $error;

    /**
     * @param array{
     *   error: PartnerError400Error,
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
