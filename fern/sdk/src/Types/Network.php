<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema containing a single network.
 */
class Network extends JsonSerializableType
{
    /**
     * @var NetworkDetails $network
     */
    #[JsonProperty('network')]
    public NetworkDetails $network;

    /**
     * @param array{
     *   network: NetworkDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->network = $values['network'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
