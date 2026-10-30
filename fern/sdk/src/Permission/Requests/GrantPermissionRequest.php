<?php

namespace Upcloud\Permission\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\Permission;

class GrantPermissionRequest extends JsonSerializableType
{
    /**
     * @var ?bool $skipTargetCheck If true, skips the check whether the target resource exists. Default is false.
     */
    public ?bool $skipTargetCheck;

    /**
     * @var Permission $body
     */
    public Permission $body;

    /**
     * @param array{
     *   body: Permission,
     *   skipTargetCheck?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->skipTargetCheck = $values['skipTargetCheck'] ?? null;
        $this->body = $values['body'];
    }
}
