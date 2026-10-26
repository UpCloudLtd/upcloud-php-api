<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class VncKeymapKeymapsKeymaps extends JsonSerializableType
{
    /**
     * @var array<string> $keymap
     */
    #[JsonProperty('keymap'), ArrayType(['string'])]
    public array $keymap;

    /**
     * @param array{
     *   keymap: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->keymap = $values['keymap'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
