<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ObjectStorage2ServiceDetailResponseStateMessagesItem extends JsonSerializableType
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
     * @var ?value-of<ObjectStorage2ServiceDetailResponseStateMessagesItemCode> $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   operationalState?: ?string,
     *   message?: ?string,
     *   code?: ?value-of<ObjectStorage2ServiceDetailResponseStateMessagesItemCode>,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->operationalState = $values['operationalState'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
