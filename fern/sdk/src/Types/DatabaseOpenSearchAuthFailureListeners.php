<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseOpenSearchAuthFailureListeners extends JsonSerializableType
{
    /**
     * @var ?DatabaseOpenSearchAuthFailureListenersInternalAuthenticationBackendLimiting $internalAuthenticationBackendLimiting
     */
    #[JsonProperty('internal_authentication_backend_limiting')]
    public ?DatabaseOpenSearchAuthFailureListenersInternalAuthenticationBackendLimiting $internalAuthenticationBackendLimiting;

    /**
     * @param array{
     *   internalAuthenticationBackendLimiting?: ?DatabaseOpenSearchAuthFailureListenersInternalAuthenticationBackendLimiting,
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
