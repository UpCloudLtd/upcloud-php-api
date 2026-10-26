<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\DatabaseServiceTaskBaseResponse;
use Upcloud\Core\Json\JsonProperty;
use DateTime;

/**
 * Response schema for retrieving information about a service task, including the operation type.
 */
class DatabaseServiceTaskResponse extends JsonSerializableType
{
    use DatabaseServiceTaskBaseResponse;

    /**
     * @var ?string $operationType The type of operation being performed.
     */
    #[JsonProperty('operation_type')]
    public ?string $operationType;

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
     *   operationType?: ?string,
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
        $this->operationType = $values['operationType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
