<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccessKey extends JsonSerializableType
{
    /**
     * @var string $accessKey
     */
    #[JsonProperty('access_key')]
    public string $accessKey;

    /**
     * @var string $basePath The path to the repository data within its container. The value of this setting should not start or end with a /
     */
    #[JsonProperty('base_path')]
    public string $basePath;

    /**
     * @var string $bucket
     */
    #[JsonProperty('bucket')]
    public string $bucket;

    /**
     * @var ?string $chunkSize Big files can be broken down into chunks during snapshotting if needed. Should be the same as for the 3rd party repository
     */
    #[JsonProperty('chunk_size')]
    public ?string $chunkSize;

    /**
     * @var ?bool $compress when set to true metadata files are stored in compressed format
     */
    #[JsonProperty('compress')]
    public ?bool $compress;

    /**
     * @var ?string $endpoint The S3 service endpoint to connect to. If you are using an S3-compatible service then you should set this to the service’s endpoint
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?string $maxRestoreBytesPerSec Throttles the restore rate per node. Defaults to unlimited. Note that if the recovery settings for managed services are set, this value is overridden by the recovery settings. Value should be a byte size with unit, e.g. 40mb, 100kb, 1gb
     */
    #[JsonProperty('max_restore_bytes_per_sec')]
    public ?string $maxRestoreBytesPerSec;

    /**
     * @var ?string $maxSnapshotBytesPerSec Throttles the snapshot rate per node. Defaults to 40mb. Note that if the recovery settings for managed services are set, this value is overridden by the recovery settings. Value should be a byte size with unit, e.g. 40mb, 100kb, 1gb
     */
    #[JsonProperty('max_snapshot_bytes_per_sec')]
    public ?string $maxSnapshotBytesPerSec;

    /**
     * @var ?bool $readonly
     */
    #[JsonProperty('readonly')]
    public ?bool $readonly;

    /**
     * @var string $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var string $secretKey AWS secret key
     */
    #[JsonProperty('secret_key')]
    public string $secretKey;

    /**
     * @var ?bool $serverSideEncryption When set to true files are encrypted on server side
     */
    #[JsonProperty('server_side_encryption')]
    public ?bool $serverSideEncryption;

    /**
     * @param array{
     *   accessKey: string,
     *   basePath: string,
     *   bucket: string,
     *   region: string,
     *   secretKey: string,
     *   chunkSize?: ?string,
     *   compress?: ?bool,
     *   endpoint?: ?string,
     *   maxRestoreBytesPerSec?: ?string,
     *   maxSnapshotBytesPerSec?: ?string,
     *   readonly?: ?bool,
     *   serverSideEncryption?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessKey = $values['accessKey'];
        $this->basePath = $values['basePath'];
        $this->bucket = $values['bucket'];
        $this->chunkSize = $values['chunkSize'] ?? null;
        $this->compress = $values['compress'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->maxRestoreBytesPerSec = $values['maxRestoreBytesPerSec'] ?? null;
        $this->maxSnapshotBytesPerSec = $values['maxSnapshotBytesPerSec'] ?? null;
        $this->readonly = $values['readonly'] ?? null;
        $this->region = $values['region'];
        $this->secretKey = $values['secretKey'];
        $this->serverSideEncryption = $values['serverSideEncryption'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
