<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating properties with an optional access control origin override.
 */
class ObjectStorage2PropertiesCreate extends JsonSerializableType
{
    /**
     * @var ?string $accessControlOriginOverride
     */
    #[JsonProperty('access_control_origin_override')]
    public ?string $accessControlOriginOverride;

    /**
     * @param array{
     *   accessControlOriginOverride?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessControlOriginOverride = $values['accessControlOriginOverride'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
