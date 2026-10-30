<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * List of available VNC keymaps
 */
class VncKeymapKeymaps extends JsonSerializableType
{
    /**
     * @var VncKeymapKeymapsKeymaps $keymaps
     */
    #[JsonProperty('keymaps')]
    public VncKeymapKeymapsKeymaps $keymaps;

    /**
     * @param array{
     *   keymaps: VncKeymapKeymapsKeymaps,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->keymaps = $values['keymaps'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
