<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for the current session of a MySQL service.
 */
class DatabaseMysqlCurrentSessionResponse extends JsonSerializableType
{
    /**
     * @var ?string $applicationName Name of the application that is connected to this service.
     */
    #[JsonProperty('application_name')]
    public ?string $applicationName;

    /**
     * @var ?string $clientAddr IP address of the client connected to this service.
     */
    #[JsonProperty('client_addr')]
    public ?string $clientAddr;

    /**
     * @var ?string $datname Name of the database this service is connected to.
     */
    #[JsonProperty('datname')]
    public ?string $datname;

    /**
     * @var ?string $id Process ID of this service.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $query Text of this service's most recent query. If state is active this shows the currently executing query; otherwise an empty string.
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?int $queryDuration The active query’s current duration, serialized as nanoseconds.
     */
    #[JsonProperty('query_duration')]
    public ?int $queryDuration;

    /**
     * @var ?string $state Current overall state of this service. Allowed values include: active (executing a query) and idle (waiting for a new client command).
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $usename Name of the user logged into this service.
     */
    #[JsonProperty('usename')]
    public ?string $usename;

    /**
     * @param array{
     *   applicationName?: ?string,
     *   clientAddr?: ?string,
     *   datname?: ?string,
     *   id?: ?string,
     *   query?: ?string,
     *   queryDuration?: ?int,
     *   state?: ?string,
     *   usename?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applicationName = $values['applicationName'] ?? null;
        $this->clientAddr = $values['clientAddr'] ?? null;
        $this->datname = $values['datname'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->queryDuration = $values['queryDuration'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->usename = $values['usename'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
