<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class RelocateServer extends JsonSerializableType
{
    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   zone: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->zone = $values['zone'];
    }
}
