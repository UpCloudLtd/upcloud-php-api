<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\NetworkBooleanYesno;

class NetworkCreateInterfaceRequestInterfaceLabelsItem extends JsonSerializableType
{
    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @var value-of<NetworkBooleanYesno> $visible
     */
    #[JsonProperty('visible')]
    public string $visible;

    /**
     * @param array{
     *   key: string,
     *   value: string,
     *   visible: value-of<NetworkBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->value = $values['value'];
        $this->visible = $values['visible'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
