<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for representing a service task response
 */
class DatabaseServiceTaskBaseResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createTime The time when the service task was created
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?string $result Optional result message
     */
    #[JsonProperty('result')]
    public ?string $result;

    /**
     * @var ?array<array<string, string>> $resultCodes Optional list of result codes as key-value maps
     */
    #[JsonProperty('result_codes'), ArrayType([['string' => 'string']])]
    public ?array $resultCodes;

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
     * @var ?bool $success Indicates if the operation was successful
     */
    #[JsonProperty('success')]
    public ?bool $success;

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
     *   createTime?: ?DateTime,
     *   result?: ?string,
     *   resultCodes?: ?array<array<string, string>>,
     *   ignoreDbs?: ?string,
     *   operation?: ?string,
     *   success?: ?bool,
     *   method?: ?string,
     *   sourcePgVersion?: ?string,
     *   targetPgVersion?: ?string,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createTime = $values['createTime'] ?? null;
        $this->result = $values['result'] ?? null;
        $this->resultCodes = $values['resultCodes'] ?? null;
        $this->ignoreDbs = $values['ignoreDbs'] ?? null;
        $this->operation = $values['operation'] ?? null;
        $this->success = $values['success'] ?? null;
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
