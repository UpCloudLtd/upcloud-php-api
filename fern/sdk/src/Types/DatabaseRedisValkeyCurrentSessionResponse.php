<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for Redis Valkey current session response.
 */
class DatabaseRedisValkeyCurrentSessionResponse extends JsonSerializableType
{
    /**
     * @var ?int $activeChannelSubscriptions Number of active channel subscriptions.
     */
    #[JsonProperty('active_channel_subscriptions')]
    public ?int $activeChannelSubscriptions;

    /**
     * @var ?string $activeDatabase Current database ID.
     */
    #[JsonProperty('active_database')]
    public ?string $activeDatabase;

    /**
     * @var ?int $activePatternMatchingChannelSubscriptions Number of pattern matching subscriptions.
     */
    #[JsonProperty('active_pattern_matching_channel_subscriptions')]
    public ?int $activePatternMatchingChannelSubscriptions;

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
     * @var ?int $connectionAge Total duration of the connection in nanoseconds.
     */
    #[JsonProperty('connection_age')]
    public ?int $connectionAge;

    /**
     * @var ?int $connectionIdle Idle time of the connection in nanoseconds.
     */
    #[JsonProperty('connection_idle')]
    public ?int $connectionIdle;

    /**
     * @var ?array<string> $flags List of flags describing the client connection.
     */
    #[JsonProperty('flags'), ArrayType(['string'])]
    public ?array $flags;

    /**
     * @var ?string $flagsRaw Client connection flags (raw string).
     */
    #[JsonProperty('flags_raw')]
    public ?string $flagsRaw;

    /**
     * @var ?string $id Process ID of this session.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $multiExecCommands Number of commands in a MULTI/EXEC context.
     */
    #[JsonProperty('multi_exec_commands')]
    public ?int $multiExecCommands;

    /**
     * @var ?int $outputBuffer Output buffer length.
     */
    #[JsonProperty('output_buffer')]
    public ?int $outputBuffer;

    /**
     * @var ?int $outputBufferMemory Output buffer memory usage.
     */
    #[JsonProperty('output_buffer_memory')]
    public ?int $outputBufferMemory;

    /**
     * @var ?int $outputListLength Output list length (replies queued when buffer is full).
     */
    #[JsonProperty('output_list_length')]
    public ?int $outputListLength;

    /**
     * @var ?string $query The last executed command.
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?int $queryBuffer Query buffer length (0 means no query pending).
     */
    #[JsonProperty('query_buffer')]
    public ?int $queryBuffer;

    /**
     * @var ?int $queryBufferFree Free space of the query buffer (0 means the buffer is full).
     */
    #[JsonProperty('query_buffer_free')]
    public ?int $queryBufferFree;

    /**
     * @param array{
     *   activeChannelSubscriptions?: ?int,
     *   activeDatabase?: ?string,
     *   activePatternMatchingChannelSubscriptions?: ?int,
     *   applicationName?: ?string,
     *   clientAddr?: ?string,
     *   connectionAge?: ?int,
     *   connectionIdle?: ?int,
     *   flags?: ?array<string>,
     *   flagsRaw?: ?string,
     *   id?: ?string,
     *   multiExecCommands?: ?int,
     *   outputBuffer?: ?int,
     *   outputBufferMemory?: ?int,
     *   outputListLength?: ?int,
     *   query?: ?string,
     *   queryBuffer?: ?int,
     *   queryBufferFree?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeChannelSubscriptions = $values['activeChannelSubscriptions'] ?? null;
        $this->activeDatabase = $values['activeDatabase'] ?? null;
        $this->activePatternMatchingChannelSubscriptions = $values['activePatternMatchingChannelSubscriptions'] ?? null;
        $this->applicationName = $values['applicationName'] ?? null;
        $this->clientAddr = $values['clientAddr'] ?? null;
        $this->connectionAge = $values['connectionAge'] ?? null;
        $this->connectionIdle = $values['connectionIdle'] ?? null;
        $this->flags = $values['flags'] ?? null;
        $this->flagsRaw = $values['flagsRaw'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->multiExecCommands = $values['multiExecCommands'] ?? null;
        $this->outputBuffer = $values['outputBuffer'] ?? null;
        $this->outputBufferMemory = $values['outputBufferMemory'] ?? null;
        $this->outputListLength = $values['outputListLength'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->queryBuffer = $values['queryBuffer'] ?? null;
        $this->queryBufferFree = $values['queryBufferFree'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
