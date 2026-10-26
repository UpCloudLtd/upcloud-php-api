<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ObjectStorage2StaticWebsiteConfigCreate;

class CreateObjectStorageStaticWebsiteRequest extends JsonSerializableType
{
    /**
     * @var ObjectStorage2StaticWebsiteConfigCreate $body
     */
    public ObjectStorage2StaticWebsiteConfigCreate $body;

    /**
     * @param array{
     *   body: ObjectStorage2StaticWebsiteConfigCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
