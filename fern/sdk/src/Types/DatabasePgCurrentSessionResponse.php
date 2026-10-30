<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for PostgreSQL current session response.
 */
class DatabasePgCurrentSessionResponse extends JsonSerializableType
{
    /**
     * @var ?string $applicationName Name of the application that is connected to this service.
     */
    #[JsonProperty('application_name')]
    public ?string $applicationName;

    /**
     * @var ?DateTime $backendStart Time when this process was started (when the client connected).
     */
    #[JsonProperty('backend_start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $backendStart;

    /**
     * @var ?string $backendType Type of current service (e.g., client backend).
     */
    #[JsonProperty('backend_type')]
    public ?string $backendType;

    /**
     * @var ?int $backendXid Top-level transaction identifier of this service, if any.
     */
    #[JsonProperty('backend_xid')]
    public ?int $backendXid;

    /**
     * @var ?int $backendXmin The current service's xmin horizon.
     */
    #[JsonProperty('backend_xmin')]
    public ?int $backendXmin;

    /**
     * @var ?string $clientAddr IP address of the connected client.
     */
    #[JsonProperty('client_addr')]
    public ?string $clientAddr;

    /**
     * @var ?string $clientHostname Hostname of the connected client (reverse DNS of client_addr).
     */
    #[JsonProperty('client_hostname')]
    public ?string $clientHostname;

    /**
     * @var ?int $clientPort TCP port number used by the client, or -1 if a Unix socket is used.
     */
    #[JsonProperty('client_port')]
    public ?int $clientPort;

    /**
     * @var ?int $datid OID of the database this service is connected to.
     */
    #[JsonProperty('datid')]
    public ?int $datid;

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
     * @var ?string $query Most recent query. If state is active, this is the currently executing query.
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?string $queryDuration The active query's current duration (as a string).
     */
    #[JsonProperty('query_duration')]
    public ?string $queryDuration;

    /**
     * @var ?DateTime $queryStart Time when the currently active (or last) query started.
     */
    #[JsonProperty('query_start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $queryStart;

    /**
     * @var ?string $state Overall state of this service (e.g., 'active' or 'idle').
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?DateTime $stateChange Time when the state was last changed.
     */
    #[JsonProperty('state_change'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $stateChange;

    /**
     * @var ?string $usename Name of the user logged into this service.
     */
    #[JsonProperty('usename')]
    public ?string $usename;

    /**
     * @var ?int $usesysid OID of the user logged into this service.
     */
    #[JsonProperty('usesysid')]
    public ?int $usesysid;

    /**
     * @var ?string $waitEvent Wait event name if the service is currently waiting.
     */
    #[JsonProperty('wait_event')]
    public ?string $waitEvent;

    /**
     * @var ?string $waitEventType Type of event for which the service is waiting (if any).
     */
    #[JsonProperty('wait_event_type')]
    public ?string $waitEventType;

    /**
     * @var ?DateTime $xactStart Time when the current transaction started.
     */
    #[JsonProperty('xact_start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $xactStart;

    /**
     * @param array{
     *   applicationName?: ?string,
     *   backendStart?: ?DateTime,
     *   backendType?: ?string,
     *   backendXid?: ?int,
     *   backendXmin?: ?int,
     *   clientAddr?: ?string,
     *   clientHostname?: ?string,
     *   clientPort?: ?int,
     *   datid?: ?int,
     *   datname?: ?string,
     *   id?: ?string,
     *   query?: ?string,
     *   queryDuration?: ?string,
     *   queryStart?: ?DateTime,
     *   state?: ?string,
     *   stateChange?: ?DateTime,
     *   usename?: ?string,
     *   usesysid?: ?int,
     *   waitEvent?: ?string,
     *   waitEventType?: ?string,
     *   xactStart?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applicationName = $values['applicationName'] ?? null;
        $this->backendStart = $values['backendStart'] ?? null;
        $this->backendType = $values['backendType'] ?? null;
        $this->backendXid = $values['backendXid'] ?? null;
        $this->backendXmin = $values['backendXmin'] ?? null;
        $this->clientAddr = $values['clientAddr'] ?? null;
        $this->clientHostname = $values['clientHostname'] ?? null;
        $this->clientPort = $values['clientPort'] ?? null;
        $this->datid = $values['datid'] ?? null;
        $this->datname = $values['datname'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->queryDuration = $values['queryDuration'] ?? null;
        $this->queryStart = $values['queryStart'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->stateChange = $values['stateChange'] ?? null;
        $this->usename = $values['usename'] ?? null;
        $this->usesysid = $values['usesysid'] ?? null;
        $this->waitEvent = $values['waitEvent'] ?? null;
        $this->waitEventType = $values['waitEventType'] ?? null;
        $this->xactStart = $values['xactStart'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
