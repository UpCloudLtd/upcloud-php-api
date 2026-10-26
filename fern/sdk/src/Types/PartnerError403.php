<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * 403 Forbidden errors for partner account creation.
 */
class PartnerError403 extends JsonSerializableType
{
    /**
     * @var PartnerError403Error $error
     */
    #[JsonProperty('error')]
    public PartnerError403Error $error;

    /**
     * @param array{
     *   error: PartnerError403Error,
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
