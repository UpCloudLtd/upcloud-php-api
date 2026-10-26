<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a TLS configuration for a frontend or backend, defining the certificate bundle and associated identifiers within the load balancer service.
 */
class LoadBalancerTlsConfig extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name assigned to the TLS configuration.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $certificateBundleUuid UUID of the certificate bundle used for TLS encryption.
     */
    #[JsonProperty('certificate_bundle_uuid')]
    public string $certificateBundleUuid;

    /**
     * @var DateTime $createdAt Timestamp when the TLS configuration was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the TLS configuration was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   certificateBundleUuid: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->certificateBundleUuid = $values['certificateBundleUuid'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
