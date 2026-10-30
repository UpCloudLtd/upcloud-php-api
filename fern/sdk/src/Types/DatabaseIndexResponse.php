<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

/**
 * Schema representing the details of an index.
 */
class DatabaseIndexResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createTime Creation time of the index.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?int $docs Number of documents in the index.
     */
    #[JsonProperty('docs')]
    public ?int $docs;

    /**
     * @var ?string $health Health status of the index.
     */
    #[JsonProperty('health')]
    public ?string $health;

    /**
     * @var ?string $indexName Name of the index.
     */
    #[JsonProperty('index_name')]
    public ?string $indexName;

    /**
     * @var ?int $numberOfReplicas Number of replicas for the index.
     */
    #[JsonProperty('number_of_replicas')]
    public ?int $numberOfReplicas;

    /**
     * @var ?int $numberOfShards Number of shards for the index.
     */
    #[JsonProperty('number_of_shards')]
    public ?int $numberOfShards;

    /**
     * @var ?bool $readOnlyAllowDelete Indicates if the index is read-only and allows deletion.
     */
    #[JsonProperty('read_only_allow_delete')]
    public ?bool $readOnlyAllowDelete;

    /**
     * @var ?int $size Size of the index in bytes.
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @var ?string $status Status of the index.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   createTime?: ?DateTime,
     *   docs?: ?int,
     *   health?: ?string,
     *   indexName?: ?string,
     *   numberOfReplicas?: ?int,
     *   numberOfShards?: ?int,
     *   readOnlyAllowDelete?: ?bool,
     *   size?: ?int,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createTime = $values['createTime'] ?? null;
        $this->docs = $values['docs'] ?? null;
        $this->health = $values['health'] ?? null;
        $this->indexName = $values['indexName'] ?? null;
        $this->numberOfReplicas = $values['numberOfReplicas'] ?? null;
        $this->numberOfShards = $values['numberOfShards'] ?? null;
        $this->readOnlyAllowDelete = $values['readOnlyAllowDelete'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
