<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchClusterRemoteStore extends JsonSerializableType
{
    /**
     * @var ?string $stateGlobalMetadataUploadTimeout The amount of time to wait for the cluster state upload to complete. Defaults to 20s.
     */
    #[JsonProperty('state.global_metadata.upload_timeout')]
    public ?string $stateGlobalMetadataUploadTimeout;

    /**
     * @var ?string $stateMetadataManifestUploadTimeout The amount of time to wait for the manifest file upload to complete. The manifest file contains the details of each of the files uploaded for a single cluster state, both index metadata files and global metadata files. Defaults to 20s.
     */
    #[JsonProperty('state.metadata_manifest.upload_timeout')]
    public ?string $stateMetadataManifestUploadTimeout;

    /**
     * @var ?string $translogBufferInterval The default value of the translog buffer interval used when performing periodic translog updates. This setting is only effective when the index setting `index.remote_store.translog.buffer_interval` is not present. Defaults to 650ms.
     */
    #[JsonProperty('translog.buffer_interval')]
    public ?string $translogBufferInterval;

    /**
     * @var ?int $translogMaxReaders Sets the maximum number of open translog files for remote-backed indexes. This limits the total number of translog files per shard. After reaching this limit, the remote store flushes the translog files. Default is 1000. The minimum required is 100.
     */
    #[JsonProperty('translog.max_readers')]
    public ?int $translogMaxReaders;

    /**
     * @param array{
     *   stateGlobalMetadataUploadTimeout?: ?string,
     *   stateMetadataManifestUploadTimeout?: ?string,
     *   translogBufferInterval?: ?string,
     *   translogMaxReaders?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->stateGlobalMetadataUploadTimeout = $values['stateGlobalMetadataUploadTimeout'] ?? null;
        $this->stateMetadataManifestUploadTimeout = $values['stateMetadataManifestUploadTimeout'] ?? null;
        $this->translogBufferInterval = $values['translogBufferInterval'] ?? null;
        $this->translogMaxReaders = $values['translogMaxReaders'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
