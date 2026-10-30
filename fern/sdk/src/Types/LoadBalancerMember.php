<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a single backend member (server node) participating in a load balancer backend configuration.
 */
class LoadBalancerMember extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name assigned to the backend member.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $ip IP address of the backend member server.
     */
    #[JsonProperty('ip')]
    public string $ip;

    /**
     * @var int $port Port number on which the backend member server listens.
     */
    #[JsonProperty('port')]
    public int $port;

    /**
     * @var int $weight Relative weight for load balancing, determining the proportion of requests sent to this member.
     */
    #[JsonProperty('weight')]
    public int $weight;

    /**
     * @var int $maxSessions Maximum number of concurrent connections allowed to this backend member.
     */
    #[JsonProperty('max_sessions')]
    public int $maxSessions;

    /**
     * @var value-of<LoadBalancerMemberType> $type Type of backend configuration. Allowed values are 'static' and 'dynamic'.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var bool $enabled Indicates whether the backend member is actively participating in load balancing.
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var bool $backup Indicates whether this member serves as a backup, only receiving traffic when all primary members are unavailable.
     */
    #[JsonProperty('backup')]
    public bool $backup;

    /**
     * @var DateTime $createdAt Timestamp when the backend member was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the backend member was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   ip: string,
     *   port: int,
     *   weight: int,
     *   maxSessions: int,
     *   type: value-of<LoadBalancerMemberType>,
     *   enabled: bool,
     *   backup: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->ip = $values['ip'];
        $this->port = $values['port'];
        $this->weight = $values['weight'];
        $this->maxSessions = $values['maxSessions'];
        $this->type = $values['type'];
        $this->enabled = $values['enabled'];
        $this->backup = $values['backup'];
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
