<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Latest capacity and inode usage measurements for the File Storage service.
 */
class FileStorageMetricsDetailResponse extends JsonSerializableType
{
    /**
     * @var int $usedBytes Storage capacity currently used, in bytes.
     */
    #[JsonProperty('used_bytes')]
    public int $usedBytes;

    /**
     * @var int $inodesTotal Total number of inodes available to the service.
     */
    #[JsonProperty('inodes_total')]
    public int $inodesTotal;

    /**
     * @var int $inodesUsed Number of inodes currently used by the service.
     */
    #[JsonProperty('inodes_used')]
    public int $inodesUsed;

    /**
     * @var DateTime $updatedAt Time at which these measurements were last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   usedBytes: int,
     *   inodesTotal: int,
     *   inodesUsed: int,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->usedBytes = $values['usedBytes'];
        $this->inodesTotal = $values['inodesTotal'];
        $this->inodesUsed = $values['inodesUsed'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
