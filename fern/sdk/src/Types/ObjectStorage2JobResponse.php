<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * A job used to sync an S3-compatible object storage with an UpCloud managed object storage.
 */
class ObjectStorage2JobResponse extends JsonSerializableType
{
    /**
     * @var string $uuid The unique identifier of the job.
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var value-of<ObjectStorage2JobResponseOperationalState> $operationalState The job operational state indicates the job's current operational, effective state. Managed by the system. `pending`: newly created job. `configuring`: the job enqueued for configuration. `running`: the job is running. `completed`: the job successfully completed. `failed`: the job failed. `canceled`: the job canceled by the user.
     */
    #[JsonProperty('operational_state')]
    public string $operationalState;

    /**
     * @var ObjectStorage2JobResponseInput $input The input of the job.
     */
    #[JsonProperty('input')]
    public ObjectStorage2JobResponseInput $input;

    /**
     * @var ?ObjectStorage2JobOutputResponse $output
     */
    #[JsonProperty('output')]
    public ?ObjectStorage2JobOutputResponse $output;

    /**
     * @var DateTime $createdAt Creation time of the job.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update time of the job.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   uuid: string,
     *   operationalState: value-of<ObjectStorage2JobResponseOperationalState>,
     *   input: ObjectStorage2JobResponseInput,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   output?: ?ObjectStorage2JobOutputResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->operationalState = $values['operationalState'];
        $this->input = $values['input'];
        $this->output = $values['output'] ?? null;
        $this->createdAt = $values['createdAt'];
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
