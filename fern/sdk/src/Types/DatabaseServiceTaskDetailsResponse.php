<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for retrieving detailed information about a specific service task, including result codes and success status.
 */
class DatabaseServiceTaskDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<string, string>> $resultCodes
     */
    #[JsonProperty('result_codes'), ArrayType([['string' => 'string']])]
    public ?array $resultCodes;

    /**
     * @var ?string $result A human-readable summary of the task result.
     */
    #[JsonProperty('result')]
    public ?string $result;

    /**
     * @var ?bool $success Indicates whether the task completed successfully.
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?DateTime $createTime The time when the service task was created
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?string $ignoreDbs Optional list of databases to ignore
     */
    #[JsonProperty('ignore_dbs')]
    public ?string $ignoreDbs;

    /**
     * @var ?string $operation The operation being performed
     */
    #[JsonProperty('operation')]
    public ?string $operation;

    /**
     * @var ?string $method Optional method used for the operation
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?string $sourcePgVersion Optional source PostgreSQL version
     */
    #[JsonProperty('source_pg_version')]
    public ?string $sourcePgVersion;

    /**
     * @var ?string $targetPgVersion Optional target PostgreSQL version
     */
    #[JsonProperty('target_pg_version')]
    public ?string $targetPgVersion;

    /**
     * @var ?string $id Optional identifier for the task
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @param array{
     *   resultCodes?: ?array<array<string, string>>,
     *   result?: ?string,
     *   success?: ?bool,
     *   createTime?: ?DateTime,
     *   ignoreDbs?: ?string,
     *   operation?: ?string,
     *   method?: ?string,
     *   sourcePgVersion?: ?string,
     *   targetPgVersion?: ?string,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->resultCodes = $values['resultCodes'] ?? null;
        $this->result = $values['result'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->ignoreDbs = $values['ignoreDbs'] ?? null;
        $this->operation = $values['operation'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->sourcePgVersion = $values['sourcePgVersion'] ?? null;
        $this->targetPgVersion = $values['targetPgVersion'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
