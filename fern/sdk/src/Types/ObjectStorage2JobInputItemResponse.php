<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Source or target object storage of a job. The secret access key is never returned.
 */
class ObjectStorage2JobInputItemResponse extends JsonSerializableType
{
    /**
     * @var string $accessKeyId Storage access key id.
     */
    #[JsonProperty('access_key_id')]
    public string $accessKeyId;

    /**
     * @var string $endpointUrl Endpoint URL of the object storage.
     */
    #[JsonProperty('endpoint_url')]
    public string $endpointUrl;

    /**
     * @var ?string $bucket The job is created for this bucket. If empty or missing, the job is created for the entire object storage.
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @param array{
     *   accessKeyId: string,
     *   endpointUrl: string,
     *   bucket?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessKeyId = $values['accessKeyId'];
        $this->endpointUrl = $values['endpointUrl'];
        $this->bucket = $values['bucket'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
