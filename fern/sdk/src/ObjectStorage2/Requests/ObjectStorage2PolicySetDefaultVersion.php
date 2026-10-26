<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2PolicySetDefaultVersion extends JsonSerializableType
{
    /**
     * @var string $versionId The policy version ID to set as default.
     */
    #[JsonProperty('version_id')]
    public string $versionId;

    /**
     * @param array{
     *   versionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->versionId = $values['versionId'];
    }
}
