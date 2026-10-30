<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for access control settings of a cluster.
 */
class DatabaseAccessControlSettingsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $accessControl If true, access control is enabled for the cluster.
     */
    #[JsonProperty('access_control')]
    public ?bool $accessControl;

    /**
     * @var ?bool $extendedAccessControl If true, extended access control features are enabled.
     */
    #[JsonProperty('extended_access_control')]
    public ?bool $extendedAccessControl;

    /**
     * @param array{
     *   accessControl?: ?bool,
     *   extendedAccessControl?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessControl = $values['accessControl'] ?? null;
        $this->extendedAccessControl = $values['extendedAccessControl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
