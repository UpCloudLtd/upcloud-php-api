<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Union;
use Upcloud\Core\Types\Date;

/**
 * Details and progress of a storage import task.
 */
class StorageImport extends JsonSerializableType
{
    /**
     * @var int $clientContentLength Content length reported by the import client, in bytes.
     */
    #[JsonProperty('client_content_length')]
    public int $clientContentLength;

    /**
     * @var string $clientContentType Content type reported by the import client.
     */
    #[JsonProperty('client_content_type')]
    public string $clientContentType;

    /**
     * @var (
     *    value-of<StorageImportCompletedZero>
     *   |DateTime
     * ) $completed Completion time in RFC 3339 format, or an empty string while unfinished.
     */
    #[JsonProperty('completed'), Union('string', 'datetime')]
    public string|DateTime $completed;

    /**
     * @var DateTime $created Time when the import task was created.
     */
    #[JsonProperty('created'), Date(Date::TYPE_DATETIME)]
    public DateTime $created;

    /**
     * @var ?string $directUploadUrl Temporary URL to which image data is uploaded in `direct_upload` mode.
     */
    #[JsonProperty('direct_upload_url')]
    public ?string $directUploadUrl;

    /**
     * @var value-of<StorageImportErrorCode> $errorCode Failure category, empty unless the task failed.
     */
    #[JsonProperty('error_code')]
    public string $errorCode;

    /**
     * @var string $errorMessage Failure details, empty unless the task failed.
     */
    #[JsonProperty('error_message')]
    public string $errorMessage;

    /**
     * @var string $md5Sum MD5 checksum of the imported data, available after completion.
     */
    #[JsonProperty('md5sum')]
    public string $md5Sum;

    /**
     * @var int $readBytes Number of bytes read from the source.
     */
    #[JsonProperty('read_bytes')]
    public int $readBytes;

    /**
     * @var string $sha256Sum SHA-256 checksum of the imported data, available after completion.
     */
    #[JsonProperty('sha256sum')]
    public string $sha256Sum;

    /**
     * @var value-of<StorageImportSource> $source Import mode.
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var ?string $sourceLocation HTTP or HTTPS source URL for an `http_import` task.
     */
    #[JsonProperty('source_location')]
    public ?string $sourceLocation;

    /**
     * @var value-of<StorageImportState> $state Current import task state.
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var int $writtenBytes Number of bytes written to the storage resource.
     */
    #[JsonProperty('written_bytes')]
    public int $writtenBytes;

    /**
     * @param array{
     *   clientContentLength: int,
     *   clientContentType: string,
     *   completed: (
     *    value-of<StorageImportCompletedZero>
     *   |DateTime
     * ),
     *   created: DateTime,
     *   errorCode: value-of<StorageImportErrorCode>,
     *   errorMessage: string,
     *   md5Sum: string,
     *   readBytes: int,
     *   sha256Sum: string,
     *   source: value-of<StorageImportSource>,
     *   state: value-of<StorageImportState>,
     *   uuid: string,
     *   writtenBytes: int,
     *   directUploadUrl?: ?string,
     *   sourceLocation?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientContentLength = $values['clientContentLength'];
        $this->clientContentType = $values['clientContentType'];
        $this->completed = $values['completed'];
        $this->created = $values['created'];
        $this->directUploadUrl = $values['directUploadUrl'] ?? null;
        $this->errorCode = $values['errorCode'];
        $this->errorMessage = $values['errorMessage'];
        $this->md5Sum = $values['md5Sum'];
        $this->readBytes = $values['readBytes'];
        $this->sha256Sum = $values['sha256Sum'];
        $this->source = $values['source'];
        $this->sourceLocation = $values['sourceLocation'] ?? null;
        $this->state = $values['state'];
        $this->uuid = $values['uuid'];
        $this->writtenBytes = $values['writtenBytes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
