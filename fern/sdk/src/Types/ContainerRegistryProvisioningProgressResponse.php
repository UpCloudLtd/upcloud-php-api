<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryProvisioningProgressResponse extends JsonSerializableType
{
    /**
     * @var string $uuid Service UUID
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var value-of<ContainerRegistryProvisioningProgressResponsePhase> $phase Current high-level provisioning phase
     */
    #[JsonProperty('phase')]
    public string $phase;

    /**
     * @var string $state Granular provisioning state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var ?int $retryCount Number of retry attempts for the current state
     */
    #[JsonProperty('retry_count')]
    public ?int $retryCount;

    /**
     * @var ?string $lastError Present when provisioning last failed. Says which part of the registry failed (storage, certificate, DNS, private access, and so on) and whether it is still being retried. The underlying failure is internal and is not reported here; state_messages carries the step it failed at.
     */
    #[JsonProperty('last_error')]
    public ?string $lastError;

    /**
     * @param array{
     *   uuid: string,
     *   phase: value-of<ContainerRegistryProvisioningProgressResponsePhase>,
     *   state: string,
     *   retryCount?: ?int,
     *   lastError?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->phase = $values['phase'];
        $this->state = $values['state'];
        $this->retryCount = $values['retryCount'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
