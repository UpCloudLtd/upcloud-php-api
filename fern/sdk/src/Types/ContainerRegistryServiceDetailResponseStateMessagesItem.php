<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryServiceDetailResponseStateMessagesItem extends JsonSerializableType
{
    /**
     * @var ?value-of<ContainerRegistryOperationalState> $operationalState
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $level
     */
    #[JsonProperty('level')]
    public ?string $level;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?DateTime $timestamp
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @param array{
     *   operationalState?: ?value-of<ContainerRegistryOperationalState>,
     *   code?: ?string,
     *   level?: ?string,
     *   message?: ?string,
     *   timestamp?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->operationalState = $values['operationalState'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->level = $values['level'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
