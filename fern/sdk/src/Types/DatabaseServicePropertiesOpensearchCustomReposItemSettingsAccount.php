<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccount extends JsonSerializableType
{
    /**
     * @var string $account
     */
    #[JsonProperty('account')]
    public string $account;

    /**
     * @var string $basePath The path to the repository data within its container. The value of this setting should not start or end with a /
     */
    #[JsonProperty('base_path')]
    public string $basePath;

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
     * @var string $container Azure container name
     */
    #[JsonProperty('container')]
    public string $container;

    /**
     * @var ?string $endpointSuffix Defines the DNS suffix for Azure Storage endpoints.
     */
    #[JsonProperty('endpoint_suffix')]
    public ?string $endpointSuffix;

    /**
     * @var ?string $key Azure account secret key. One of key or sas_token should be specified
     */
    #[JsonProperty('key')]
    public ?string $key;

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
     * @var ?string $sasToken A shared access signatures (SAS) token. One of key or sas_token should be specified
     */
    #[JsonProperty('sas_token')]
    public ?string $sasToken;

    /**
     * @param array{
     *   account: string,
     *   basePath: string,
     *   container: string,
     *   chunkSize?: ?string,
     *   compress?: ?bool,
     *   endpointSuffix?: ?string,
     *   key?: ?string,
     *   maxRestoreBytesPerSec?: ?string,
     *   maxSnapshotBytesPerSec?: ?string,
     *   readonly?: ?bool,
     *   sasToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->account = $values['account'];
        $this->basePath = $values['basePath'];
        $this->chunkSize = $values['chunkSize'] ?? null;
        $this->compress = $values['compress'] ?? null;
        $this->container = $values['container'];
        $this->endpointSuffix = $values['endpointSuffix'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->maxRestoreBytesPerSec = $values['maxRestoreBytesPerSec'] ?? null;
        $this->maxSnapshotBytesPerSec = $values['maxSnapshotBytesPerSec'] ?? null;
        $this->readonly = $values['readonly'] ?? null;
        $this->sasToken = $values['sasToken'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
