<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

/**
 * Detailed public information about a Cloud Server
 */
class ServerDetails extends JsonSerializableType
{
    /**
     * @var ?string $bootOrder
     */
    #[JsonProperty('boot_order')]
    public ?string $bootOrder;

    /**
     * @var string $coreNumber Number of CPU cores.
     */
    #[JsonProperty('core_number')]
    public string $coreNumber;

    /**
     * @var int $created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var ?ServerDetailsDevices $devices
     */
    #[JsonProperty('devices')]
    public ?ServerDetailsDevices $devices;

    /**
     * @var ?value-of<ServerBooleanOnoff> $firewall
     */
    #[JsonProperty('firewall')]
    public ?string $firewall;

    /**
     * @var ?value-of<ServerBooleanOnoff> $firewallPrivate
     */
    #[JsonProperty('firewall_private')]
    public ?string $firewallPrivate;

    /**
     * @var ?value-of<ServerDetailsFirewallPrivateDefaultIncomingAction> $firewallPrivateDefaultIncomingAction
     */
    #[JsonProperty('firewall_private_default_incoming_action')]
    public ?string $firewallPrivateDefaultIncomingAction;

    /**
     * @var ?value-of<ServerDetailsFirewallPrivateDefaultOutgoingAction> $firewallPrivateDefaultOutgoingAction
     */
    #[JsonProperty('firewall_private_default_outgoing_action')]
    public ?string $firewallPrivateDefaultOutgoingAction;

    /**
     * @var ?value-of<ServerDetailsFirewallPublicDefaultIncomingAction> $firewallPublicDefaultIncomingAction
     */
    #[JsonProperty('firewall_public_default_incoming_action')]
    public ?string $firewallPublicDefaultIncomingAction;

    /**
     * @var ?value-of<ServerDetailsFirewallPublicDefaultOutgoingAction> $firewallPublicDefaultOutgoingAction
     */
    #[JsonProperty('firewall_public_default_outgoing_action')]
    public ?string $firewallPublicDefaultOutgoingAction;

    /**
     * @var ?int $host
     */
    #[JsonProperty('host')]
    public ?int $host;

    /**
     * @var string $hostname Cloud Server hostname.
     */
    #[JsonProperty('hostname')]
    public string $hostname;

    /**
     * @var ?ServerIpAddresses $ipAddresses
     */
    #[JsonProperty('ip_addresses')]
    public ?ServerIpAddresses $ipAddresses;

    /**
     * @var ?ServerLabels $labels
     */
    #[JsonProperty('labels')]
    public ?ServerLabels $labels;

    /**
     * @var string $license Hourly license price
     */
    #[JsonProperty('license')]
    public string $license;

    /**
     * @var string $memoryAmount Memory in MiB.
     */
    #[JsonProperty('memory_amount')]
    public string $memoryAmount;

    /**
     * @var ?value-of<ServerBooleanYesno> $metadata
     */
    #[JsonProperty('metadata')]
    public ?string $metadata;

    /**
     * @var ?ServerNetworking $networking
     */
    #[JsonProperty('networking')]
    public ?ServerNetworking $networking;

    /**
     * @var ?value-of<ServerNicModel> $nicModel
     */
    #[JsonProperty('nic_model')]
    public ?string $nicModel;

    /**
     * @var ?string $plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?string $planIpv4Bytes Public IPv4 outbound traffic this billing month, in bytes.
     */
    #[JsonProperty('plan_ipv4_bytes')]
    public ?string $planIpv4Bytes;

    /**
     * @var ?string $planIpv6Bytes Public IPv6 outbound traffic this billing month, in bytes.
     */
    #[JsonProperty('plan_ipv6_bytes')]
    public ?string $planIpv6Bytes;

    /**
     * @var ?string $password One-time login password returned when the Cloud Server is created.
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?string $progress Progress percentage for an operation in progress.
     */
    #[JsonProperty('progress')]
    public ?string $progress;

    /**
     * @var ?value-of<ServerRemoteAccessEnabled> $remoteAccessEnabled
     */
    #[JsonProperty('remote_access_enabled')]
    public ?string $remoteAccessEnabled;

    /**
     * @var ?string $remoteAccessHost Remote access hostname.
     */
    #[JsonProperty('remote_access_host')]
    public ?string $remoteAccessHost;

    /**
     * @var ?string $remoteAccessPassword
     */
    #[JsonProperty('remote_access_password')]
    public ?string $remoteAccessPassword;

    /**
     * @var ?string $remoteAccessPort Remote access port.
     */
    #[JsonProperty('remote_access_port')]
    public ?string $remoteAccessPort;

    /**
     * @var ?value-of<ServerRemoteAccessType> $remoteAccessType
     */
    #[JsonProperty('remote_access_type')]
    public ?string $remoteAccessType;

    /**
     * @var ?string $serverGroup
     */
    #[JsonProperty('server_group')]
    public ?string $serverGroup;

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
     * @var ?ServerStorageDevicesResponse $storageDevices
     */
    #[JsonProperty('storage_devices')]
    public ?ServerStorageDevicesResponse $storageDevices;

    /**
     * @var (
     *    array<string>
     *   |ServerTagsTag
     * )|null $tags
     */
    #[JsonProperty('tags'), Union(['string'], ServerTagsTag::class, 'null')]
    public array|ServerTagsTag|null $tags;

    /**
     * @var ?string $timezone Configured timezone.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var string $title Display title.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var ?string $videoModel
     */
    #[JsonProperty('video_model')]
    public ?string $videoModel;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   coreNumber: string,
     *   created: int,
     *   hostname: string,
     *   license: string,
     *   memoryAmount: string,
     *   state: value-of<ServerState>,
     *   title: string,
     *   uuid: string,
     *   zone: string,
     *   bootOrder?: ?string,
     *   devices?: ?ServerDetailsDevices,
     *   firewall?: ?value-of<ServerBooleanOnoff>,
     *   firewallPrivate?: ?value-of<ServerBooleanOnoff>,
     *   firewallPrivateDefaultIncomingAction?: ?value-of<ServerDetailsFirewallPrivateDefaultIncomingAction>,
     *   firewallPrivateDefaultOutgoingAction?: ?value-of<ServerDetailsFirewallPrivateDefaultOutgoingAction>,
     *   firewallPublicDefaultIncomingAction?: ?value-of<ServerDetailsFirewallPublicDefaultIncomingAction>,
     *   firewallPublicDefaultOutgoingAction?: ?value-of<ServerDetailsFirewallPublicDefaultOutgoingAction>,
     *   host?: ?int,
     *   ipAddresses?: ?ServerIpAddresses,
     *   labels?: ?ServerLabels,
     *   metadata?: ?value-of<ServerBooleanYesno>,
     *   networking?: ?ServerNetworking,
     *   nicModel?: ?value-of<ServerNicModel>,
     *   plan?: ?string,
     *   planIpv4Bytes?: ?string,
     *   planIpv6Bytes?: ?string,
     *   password?: ?string,
     *   progress?: ?string,
     *   remoteAccessEnabled?: ?value-of<ServerRemoteAccessEnabled>,
     *   remoteAccessHost?: ?string,
     *   remoteAccessPassword?: ?string,
     *   remoteAccessPort?: ?string,
     *   remoteAccessType?: ?value-of<ServerRemoteAccessType>,
     *   serverGroup?: ?string,
     *   simpleBackup?: ?string,
     *   storageDevices?: ?ServerStorageDevicesResponse,
     *   tags?: (
     *    array<string>
     *   |ServerTagsTag
     * )|null,
     *   timezone?: ?string,
     *   username?: ?string,
     *   videoModel?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bootOrder = $values['bootOrder'] ?? null;
        $this->coreNumber = $values['coreNumber'];
        $this->created = $values['created'];
        $this->devices = $values['devices'] ?? null;
        $this->firewall = $values['firewall'] ?? null;
        $this->firewallPrivate = $values['firewallPrivate'] ?? null;
        $this->firewallPrivateDefaultIncomingAction = $values['firewallPrivateDefaultIncomingAction'] ?? null;
        $this->firewallPrivateDefaultOutgoingAction = $values['firewallPrivateDefaultOutgoingAction'] ?? null;
        $this->firewallPublicDefaultIncomingAction = $values['firewallPublicDefaultIncomingAction'] ?? null;
        $this->firewallPublicDefaultOutgoingAction = $values['firewallPublicDefaultOutgoingAction'] ?? null;
        $this->host = $values['host'] ?? null;
        $this->hostname = $values['hostname'];
        $this->ipAddresses = $values['ipAddresses'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->license = $values['license'];
        $this->memoryAmount = $values['memoryAmount'];
        $this->metadata = $values['metadata'] ?? null;
        $this->networking = $values['networking'] ?? null;
        $this->nicModel = $values['nicModel'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->planIpv4Bytes = $values['planIpv4Bytes'] ?? null;
        $this->planIpv6Bytes = $values['planIpv6Bytes'] ?? null;
        $this->password = $values['password'] ?? null;
        $this->progress = $values['progress'] ?? null;
        $this->remoteAccessEnabled = $values['remoteAccessEnabled'] ?? null;
        $this->remoteAccessHost = $values['remoteAccessHost'] ?? null;
        $this->remoteAccessPassword = $values['remoteAccessPassword'] ?? null;
        $this->remoteAccessPort = $values['remoteAccessPort'] ?? null;
        $this->remoteAccessType = $values['remoteAccessType'] ?? null;
        $this->serverGroup = $values['serverGroup'] ?? null;
        $this->simpleBackup = $values['simpleBackup'] ?? null;
        $this->state = $values['state'];
        $this->storageDevices = $values['storageDevices'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->title = $values['title'];
        $this->username = $values['username'] ?? null;
        $this->uuid = $values['uuid'];
        $this->videoModel = $values['videoModel'] ?? null;
        $this->zone = $values['zone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
