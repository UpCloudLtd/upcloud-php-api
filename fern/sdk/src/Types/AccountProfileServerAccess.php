<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountProfileServerAccess extends JsonSerializableType
{
    /**
     * @var array<AccountProfileServerAccessServerItem> $server
     */
    #[JsonProperty('server'), ArrayType([AccountProfileServerAccessServerItem::class])]
    public array $server;

    /**
     * @param array{
     *   server: array<AccountProfileServerAccessServerItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
