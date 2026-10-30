<?php

namespace Upcloud\Price\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class GetPriceRequest extends JsonSerializableType
{
    /**
     * @var ?string $zone Filter results to a specific zone. Can be specified multiple times.
     */
    public ?string $zone;

    /**
     * @param array{
     *   zone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->zone = $values['zone'] ?? null;
    }
}
