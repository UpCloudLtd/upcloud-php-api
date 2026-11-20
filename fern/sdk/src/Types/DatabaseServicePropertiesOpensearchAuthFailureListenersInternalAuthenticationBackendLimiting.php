<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimiting extends JsonSerializableType
{
    /**
     * @var ?int $allowedTries The number of login attempts allowed before login is blocked
     */
    #[JsonProperty('allowed_tries')]
    public ?int $allowedTries;

    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimitingAuthenticationBackend> $authenticationBackend The internal backend. Enter `internal`
     */
    #[JsonProperty('authentication_backend')]
    public ?string $authenticationBackend;

    /**
     * @var ?int $blockExpirySeconds The duration of time that login remains blocked after a failed login
     */
    #[JsonProperty('block_expiry_seconds')]
    public ?int $blockExpirySeconds;

    /**
     * @var ?int $maxBlockedClients The maximum number of blocked IP addresses
     */
    #[JsonProperty('max_blocked_clients')]
    public ?int $maxBlockedClients;

    /**
     * @var ?int $maxTrackedClients The maximum number of tracked IP addresses that have failed login
     */
    #[JsonProperty('max_tracked_clients')]
    public ?int $maxTrackedClients;

    /**
     * @var ?int $timeWindowSeconds The window of time in which the value for `allowed_tries` is enforced
     */
    #[JsonProperty('time_window_seconds')]
    public ?int $timeWindowSeconds;

    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimitingType> $type The type of rate limiting
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   allowedTries?: ?int,
     *   authenticationBackend?: ?value-of<DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimitingAuthenticationBackend>,
     *   blockExpirySeconds?: ?int,
     *   maxBlockedClients?: ?int,
     *   maxTrackedClients?: ?int,
     *   timeWindowSeconds?: ?int,
     *   type?: ?value-of<DatabaseServicePropertiesOpensearchAuthFailureListenersInternalAuthenticationBackendLimitingType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowedTries = $values['allowedTries'] ?? null;
        $this->authenticationBackend = $values['authenticationBackend'] ?? null;
        $this->blockExpirySeconds = $values['blockExpirySeconds'] ?? null;
        $this->maxBlockedClients = $values['maxBlockedClients'] ?? null;
        $this->maxTrackedClients = $values['maxTrackedClients'] ?? null;
        $this->timeWindowSeconds = $values['timeWindowSeconds'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
