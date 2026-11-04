<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class AccountProfileTagAccessTagItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<AccountBooleanYesno> $storage
     */
    #[JsonProperty('storage')]
    public string $storage;

    /**
     * @param array{
     *   name: string,
     *   storage: value-of<AccountBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
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
