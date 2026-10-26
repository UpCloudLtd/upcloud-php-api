<?php

namespace Upcloud\Network\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Network\Types\ModifyNetworkRequestNetwork;
use Upcloud\Core\Json\JsonProperty;

class ModifyNetworkRequest extends JsonSerializableType
{
    /**
     * @var ModifyNetworkRequestNetwork $network
     */
    #[JsonProperty('network')]
    public ModifyNetworkRequestNetwork $network;

    /**
     * @param array{
     *   network: ModifyNetworkRequestNetwork,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->network = $values['network'];
    }
}
