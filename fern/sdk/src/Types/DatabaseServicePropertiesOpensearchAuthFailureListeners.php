<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchAuthFailureListeners extends JsonSerializableType
{
    /**
     * @var ?DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimiting $internalAuthenticationBackendLimiting
     */
    #[JsonProperty('internal_authentication_backend_limiting')]
    public ?DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimiting $internalAuthenticationBackendLimiting;

    /**
     * @param array{
     *   internalAuthenticationBackendLimiting?: ?DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimiting,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->internalAuthenticationBackendLimiting = $values['internalAuthenticationBackendLimiting'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
