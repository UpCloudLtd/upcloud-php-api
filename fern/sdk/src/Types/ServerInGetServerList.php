<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

/**
 * Schema for a Cloud Server item returned in Cloud Server list responses.
 */
class ServerInGetServerList extends JsonSerializableType
{
    /**
     * @var int $created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var string $coreNumber Number of CPU cores allocated to the Cloud Server.
     */
    #[JsonProperty('core_number')]
    public string $coreNumber;

    /**
     * @var ?int $host
     */
    #[JsonProperty('host')]
    public ?int $host;

    /**
     * @var string $hostname Hostname configured for the Cloud Server.
     */
    #[JsonProperty('hostname')]
    public string $hostname;

    /**
     * @var ?ServerInGetServerListLabels $labels Labels assigned to the Cloud Server.
     */
    #[JsonProperty('labels')]
    public ?ServerInGetServerListLabels $labels;

    /**
     * @var string $license Hourly operating system license charge in credits.
     */
    #[JsonProperty('license')]
    public string $license;

    /**
     * @var string $memoryAmount Amount of memory allocated to the Cloud Server, in MiB.
     */
    #[JsonProperty('memory_amount')]
    public string $memoryAmount;

    /**
     * @var ?string $plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?string $planIpv4Bytes Public IPv4 outbound traffic used during the current billing month, in bytes.
     */
    #[JsonProperty('plan_ipv4_bytes')]
    public ?string $planIpv4Bytes;

    /**
     * @var ?string $planIpv6Bytes Public IPv6 outbound traffic used during the current billing month, in bytes.
     */
    #[JsonProperty('plan_ipv6_bytes')]
    public ?string $planIpv6Bytes;

    /**
     * @var ?string $progress Progress percentage for an operation that places the Cloud Server in maintenance state.
     */
    #[JsonProperty('progress')]
    public ?string $progress;

    /**
     * @var ?string $simpleBackup
     */
    #[JsonProperty('simple_backup')]
    public ?string $simpleBackup;

    /**
     * @var value-of<ServerState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var (
     *    array<string>
     *   |ServerTagsTag
     * )|null $tags
     */
    #[JsonProperty('tags'), Union(['string'], ServerTagsTag::class, 'null')]
    public array|ServerTagsTag|null $tags;

    /**
     * @var string $title Display title of the Cloud Server.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var ?string $serverGroup
     */
    #[JsonProperty('server_group')]
    public ?string $serverGroup;

    /**
     * @param array{
     *   created: int,
     *   coreNumber: string,
     *   hostname: string,
     *   license: string,
     *   memoryAmount: string,
     *   state: value-of<ServerState>,
     *   title: string,
     *   uuid: string,
     *   zone: string,
     *   host?: ?int,
     *   labels?: ?ServerInGetServerListLabels,
     *   plan?: ?string,
     *   planIpv4Bytes?: ?string,
     *   planIpv6Bytes?: ?string,
     *   progress?: ?string,
     *   simpleBackup?: ?string,
     *   tags?: (
     *    array<string>
     *   |ServerTagsTag
     * )|null,
     *   serverGroup?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->created = $values['created'];
        $this->coreNumber = $values['coreNumber'];
        $this->host = $values['host'] ?? null;
        $this->hostname = $values['hostname'];
        $this->labels = $values['labels'] ?? null;
        $this->license = $values['license'];
        $this->memoryAmount = $values['memoryAmount'];
        $this->plan = $values['plan'] ?? null;
        $this->planIpv4Bytes = $values['planIpv4Bytes'] ?? null;
        $this->planIpv6Bytes = $values['planIpv6Bytes'] ?? null;
        $this->progress = $values['progress'] ?? null;
        $this->simpleBackup = $values['simpleBackup'] ?? null;
        $this->state = $values['state'];
        $this->tags = $values['tags'] ?? null;
        $this->title = $values['title'];
        $this->uuid = $values['uuid'];
        $this->zone = $values['zone'];
        $this->serverGroup = $values['serverGroup'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
