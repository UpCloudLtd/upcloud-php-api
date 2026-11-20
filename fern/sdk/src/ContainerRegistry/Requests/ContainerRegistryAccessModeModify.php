<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\ContainerRegistry\Types\ContainerRegistryAccessModeModifyAccessMode;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryAccessModeModify extends JsonSerializableType
{
    /**
     * @var value-of<ContainerRegistryAccessModeModifyAccessMode> $accessMode Desired network access mode
     */
    #[JsonProperty('access_mode')]
    public string $accessMode;

    /**
     * @param array{
     *   accessMode: value-of<ContainerRegistryAccessModeModifyAccessMode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessMode = $values['accessMode'];
    }
}
