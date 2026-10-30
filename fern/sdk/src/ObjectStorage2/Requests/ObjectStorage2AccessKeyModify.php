<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\ObjectStorage2\Types\ObjectStorage2AccessKeyModifyStatus;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2AccessKeyModify extends JsonSerializableType
{
    /**
     * @var ?value-of<ObjectStorage2AccessKeyModifyStatus> $status Indicates if the key is active or inactive.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   status?: ?value-of<ObjectStorage2AccessKeyModifyStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }
}
