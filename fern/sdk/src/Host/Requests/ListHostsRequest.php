<?php

namespace Upcloud\Host\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListHostsRequest extends JsonSerializableType
{
    /**
     * @var ?string $zone Limit the list to hosts in the specified private cloud zone.
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
