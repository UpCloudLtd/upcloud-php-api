<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceTypeModify extends JsonSerializableType
{
    /**
     * @var string $targetType Service type
     */
    #[JsonProperty('target_type')]
    public string $targetType;

    /**
     * @param array{
     *   targetType: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->targetType = $values['targetType'];
    }
}
