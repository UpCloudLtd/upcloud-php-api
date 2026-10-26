<?php

namespace Upcloud\Gateway\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class GatewayAddressModifyRequest extends JsonSerializableType
{
    /**
     * @var string $address Floating IP address to assign to the service address.
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @param array{
     *   address: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
    }
}
