<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class AccountProfileServerAccessServerItem extends JsonSerializableType
{
    /**
     * @var string $uuid Cloud Server UUID or * for all Cloud Servers.
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var value-of<AccountBooleanYesno> $storage
     */
    #[JsonProperty('storage')]
    public string $storage;

    /**
     * @param array{
     *   uuid: string,
     *   storage: value-of<AccountBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->storage = $values['storage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
