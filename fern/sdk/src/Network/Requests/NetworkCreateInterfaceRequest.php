<?php

namespace Upcloud\Network\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Network\Types\NetworkCreateInterfaceRequestInterface;

class NetworkCreateInterfaceRequest extends JsonSerializableType
{
    /**
     * @var ?int $mainAccountId
     */
    #[JsonProperty('main_account_id')]
    public ?int $mainAccountId;

    /**
     * @var ?NetworkCreateInterfaceRequestInterface $interface
     */
    #[JsonProperty('interface')]
    public ?NetworkCreateInterfaceRequestInterface $interface;

    /**
     * @param array{
     *   mainAccountId?: ?int,
     *   interface?: ?NetworkCreateInterfaceRequestInterface,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mainAccountId = $values['mainAccountId'] ?? null;
        $this->interface = $values['interface'] ?? null;
    }
}
