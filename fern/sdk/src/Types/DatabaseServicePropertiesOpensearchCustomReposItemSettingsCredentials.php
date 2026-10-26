<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentials extends JsonSerializableType
{
    /**
     * @var string $basePath The path to the repository data within its container. The value of this setting should not start or end with a /
     */
    #[JsonProperty('base_path')]
    public string $basePath;

    /**
     * @var string $bucket The path to the repository data within its container
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
     * @var DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentialsCredentials $credentials
     */
    #[JsonProperty('credentials')]
    public DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentialsCredentials $credentials;

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
     * @param array{
     *   basePath: string,
     *   bucket: string,
     *   credentials: DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentialsCredentials,
     *   chunkSize?: ?string,
     *   compress?: ?bool,
     *   maxRestoreBytesPerSec?: ?string,
     *   maxSnapshotBytesPerSec?: ?string,
     *   readonly?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->basePath = $values['basePath'];
        $this->bucket = $values['bucket'];
        $this->chunkSize = $values['chunkSize'] ?? null;
        $this->compress = $values['compress'] ?? null;
        $this->credentials = $values['credentials'];
        $this->maxRestoreBytesPerSec = $values['maxRestoreBytesPerSec'] ?? null;
        $this->maxSnapshotBytesPerSec = $values['maxSnapshotBytesPerSec'] ?? null;
        $this->readonly = $values['readonly'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
