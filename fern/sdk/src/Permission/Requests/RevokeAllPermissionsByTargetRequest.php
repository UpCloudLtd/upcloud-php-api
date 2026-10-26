<?php

namespace Upcloud\Permission\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class RevokeAllPermissionsByTargetRequest extends JsonSerializableType
{
    /**
     * @var ?int $mainAccountId If specified, revokes permissions for resources owned by the specified main account ID. Default is the current main account.
     */
    public ?int $mainAccountId;

    /**
     * @param array{
     *   mainAccountId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mainAccountId = $values['mainAccountId'] ?? null;
    }
}
