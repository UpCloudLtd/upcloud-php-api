<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class FileStorageServiceDetailResponseStateMessagesItem extends JsonSerializableType
{
    /**
     * @var ?string $operationalState
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @param array{
     *   operationalState?: ?string,
     *   message?: ?string,
     *   code?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->operationalState = $values['operationalState'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->code = $values['code'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
