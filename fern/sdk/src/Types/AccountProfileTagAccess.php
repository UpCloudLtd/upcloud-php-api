<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountProfileTagAccess extends JsonSerializableType
{
    /**
     * @var array<AccountProfileTagAccessTagItem> $tag
     */
    #[JsonProperty('tag'), ArrayType([AccountProfileTagAccessTagItem::class])]
    public array $tag;

    /**
     * @param array{
     *   tag: array<AccountProfileTagAccessTagItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->tag = $values['tag'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
