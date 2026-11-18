<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Progress of a job.
 */
class ObjectStorage2JobOutputResponse extends JsonSerializableType
{
    /**
     * @var ?int $bytes Bytes transferred so far.
     */
    #[JsonProperty('bytes')]
    public ?int $bytes;

    /**
     * @var ?int $totalBytes Total bytes to transfer.
     */
    #[JsonProperty('total_bytes')]
    public ?int $totalBytes;

    /**
     * @var ?string $transferTime Transfer time in seconds.
     */
    #[JsonProperty('transfer_time')]
    public ?string $transferTime;

    /**
     * @var ?string $error Error message if the job has failed or has errors.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @param array{
     *   bytes?: ?int,
     *   totalBytes?: ?int,
     *   transferTime?: ?string,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bytes = $values['bytes'] ?? null;
        $this->totalBytes = $values['totalBytes'] ?? null;
        $this->transferTime = $values['transferTime'] ?? null;
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
