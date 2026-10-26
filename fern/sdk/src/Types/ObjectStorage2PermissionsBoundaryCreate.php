<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating a permissions boundary with a specified policy name.
 */
class ObjectStorage2PermissionsBoundaryCreate extends JsonSerializableType
{
    /**
     * @var string $policyName Name of the policy to use as the permissions boundary.
     */
    #[JsonProperty('policy_name')]
    public string $policyName;

    /**
     * @param array{
     *   policyName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->policyName = $values['policyName'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
