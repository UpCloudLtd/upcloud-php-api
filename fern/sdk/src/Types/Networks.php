<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema containing a list of networks.
 */
class Networks extends JsonSerializableType
{
    /**
     * @var NetworksNetworks $networks Container object for network items.
     */
    #[JsonProperty('networks')]
    public NetworksNetworks $networks;

    /**
     * @param array{
     *   networks: NetworksNetworks,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->networks = $values['networks'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
