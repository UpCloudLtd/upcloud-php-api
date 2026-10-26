<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceAclModify extends JsonSerializableType
{
    /**
     * @var ?bool $accessControl Enables OpenSearch access control
     */
    #[JsonProperty('access_control')]
    public ?bool $accessControl;

    /**
     * @var ?bool $extendedAccessControl Enables OpenSearch extended access control
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
}
