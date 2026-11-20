<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Object storage definition for the job source or target.
 */
class ObjectStorage2JobInputItemCreate extends JsonSerializableType
{
    /**
     * @var string $accessKeyId Storage access key id.
     */
    #[JsonProperty('access_key_id')]
    public string $accessKeyId;

    /**
     * @var string $secretAccessKey Storage secret access key.
     */
    #[JsonProperty('secret_access_key')]
    public string $secretAccessKey;

    /**
     * @var string $endpointUrl Endpoint URL. For the source it can belong to any S3-compatible object storage, for the target it must be an UpCloud managed object storage URL.
     */
    #[JsonProperty('endpoint_url')]
    public string $endpointUrl;

    /**
     * @var ?string $bucket The job is created for this bucket if provided. If empty or missing, the job is created for the entire object storage.
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @param array{
     *   accessKeyId: string,
     *   secretAccessKey: string,
     *   endpointUrl: string,
     *   bucket?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessKeyId = $values['accessKeyId'];
        $this->secretAccessKey = $values['secretAccessKey'];
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
