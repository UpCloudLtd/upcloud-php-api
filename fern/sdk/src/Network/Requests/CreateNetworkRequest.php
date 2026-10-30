<?php

namespace Upcloud\Network\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Network\Types\CreateNetworkRequestNetwork;
use Upcloud\Core\Json\JsonProperty;

class CreateNetworkRequest extends JsonSerializableType
{
    /**
     * @var CreateNetworkRequestNetwork $network
     */
    #[JsonProperty('network')]
    public CreateNetworkRequestNetwork $network;

    /**
     * @param array{
     *   network: CreateNetworkRequestNetwork,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->network = $values['network'];
    }
}
