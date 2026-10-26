<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Invalid price request error.
 */
class PriceError400 extends JsonSerializableType
{
    /**
     * @var PriceError400Error $error
     */
    #[JsonProperty('error')]
    public PriceError400Error $error;

    /**
     * @param array{
     *   error: PriceError400Error,
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
