<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ServerBooleanOnoff;
use Upcloud\Types\ServerIpAddresses;
use Upcloud\Types\ServerLabels;
use Upcloud\Types\ServerLoginUser;
use Upcloud\Types\ServerCreateNetworking;
use Upcloud\Types\ServerNicModel;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Types\ServerCreateDevices;
use Upcloud\Types\ServerRemoteAccessEnabled;
use Upcloud\Types\ServerRemoteAccessType;
use Upcloud\Types\ServerStorageDevices;

class CreateServerServer extends JsonSerializableType
{
    /**
     * @var ?int $avoidHost
     */
    #[JsonProperty('avoid_host')]
    public ?int $avoidHost;

    /**
     * @var ?string $bootOrder
     */
    #[JsonProperty('boot_order')]
    public ?string $bootOrder;

    /**
     * @var ?int $coreNumber
     */
    #[JsonProperty('core_number')]
    public ?int $coreNumber;

    /**
     * @var ?value-of<ServerBooleanOnoff> $firewall
     */
    #[JsonProperty('firewall')]
    public ?string $firewall;

    /**
     * @var ?int $host
     */
    #[JsonProperty('host')]
    public ?int $host;

    /**
     * @var string $hostname
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
     * @var ?ServerLoginUser $loginUser
     */
    #[JsonProperty('login_user')]
    public ?ServerLoginUser $loginUser;

    /**
     * @var ?int $memoryAmount
     */
    #[JsonProperty('memory_amount')]
    public ?int $memoryAmount;

    /**
     * @var ?ServerCreateNetworking $networking
     */
    #[JsonProperty('networking')]
    public ?ServerCreateNetworking $networking;

    /**
     * @var ?value-of<ServerNicModel> $nicModel
     */
    #[JsonProperty('nic_model')]
    public ?string $nicModel;

    /**
     * @var ?string $passwordDelivery
     */
    #[JsonProperty('password_delivery')]
    public ?string $passwordDelivery;

    /**
     * @var ?string $plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

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
     * @var ?value-of<ServerBooleanYesno> $metadata
     */
    #[JsonProperty('metadata')]
    public ?string $metadata;

    /**
     * @var ?ServerCreateDevices $devices
     */
    #[JsonProperty('devices')]
    public ?ServerCreateDevices $devices;

    /**
     * @var ?value-of<ServerRemoteAccessEnabled> $remoteAccessEnabled
     */
    #[JsonProperty('remote_access_enabled')]
    public ?string $remoteAccessEnabled;

    /**
     * @var ?string $remoteAccessPassword
     */
    #[JsonProperty('remote_access_password')]
    public ?string $remoteAccessPassword;

    /**
     * @var ?value-of<ServerRemoteAccessType> $remoteAccessType
     */
    #[JsonProperty('remote_access_type')]
    public ?string $remoteAccessType;

    /**
     * @var ServerStorageDevices $storageDevices
     */
    #[JsonProperty('storage_devices')]
    public ServerStorageDevices $storageDevices;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $userData
     */
    #[JsonProperty('user_data')]
    public ?string $userData;

    /**
     * @var ?string $videoModel
     */
    #[JsonProperty('video_model')]
    public ?string $videoModel;

    /**
     * @var ?string $vncKeymap
     */
    #[JsonProperty('vnc_keymap')]
    public ?string $vncKeymap;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   hostname: string,
     *   storageDevices: ServerStorageDevices,
     *   title: string,
     *   zone: string,
     *   avoidHost?: ?int,
     *   bootOrder?: ?string,
     *   coreNumber?: ?int,
     *   firewall?: ?value-of<ServerBooleanOnoff>,
     *   host?: ?int,
     *   ipAddresses?: ?ServerIpAddresses,
     *   labels?: ?ServerLabels,
     *   loginUser?: ?ServerLoginUser,
     *   memoryAmount?: ?int,
     *   networking?: ?ServerCreateNetworking,
     *   nicModel?: ?value-of<ServerNicModel>,
     *   passwordDelivery?: ?string,
     *   plan?: ?string,
     *   serverGroup?: ?string,
     *   simpleBackup?: ?string,
     *   metadata?: ?value-of<ServerBooleanYesno>,
     *   devices?: ?ServerCreateDevices,
     *   remoteAccessEnabled?: ?value-of<ServerRemoteAccessEnabled>,
     *   remoteAccessPassword?: ?string,
     *   remoteAccessType?: ?value-of<ServerRemoteAccessType>,
     *   timezone?: ?string,
     *   userData?: ?string,
     *   videoModel?: ?string,
     *   vncKeymap?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->avoidHost = $values['avoidHost'] ?? null;
        $this->bootOrder = $values['bootOrder'] ?? null;
        $this->coreNumber = $values['coreNumber'] ?? null;
        $this->firewall = $values['firewall'] ?? null;
        $this->host = $values['host'] ?? null;
        $this->hostname = $values['hostname'];
        $this->ipAddresses = $values['ipAddresses'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->loginUser = $values['loginUser'] ?? null;
        $this->memoryAmount = $values['memoryAmount'] ?? null;
        $this->networking = $values['networking'] ?? null;
        $this->nicModel = $values['nicModel'] ?? null;
        $this->passwordDelivery = $values['passwordDelivery'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->serverGroup = $values['serverGroup'] ?? null;
        $this->simpleBackup = $values['simpleBackup'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->devices = $values['devices'] ?? null;
        $this->remoteAccessEnabled = $values['remoteAccessEnabled'] ?? null;
        $this->remoteAccessPassword = $values['remoteAccessPassword'] ?? null;
        $this->remoteAccessType = $values['remoteAccessType'] ?? null;
        $this->storageDevices = $values['storageDevices'];
        $this->timezone = $values['timezone'] ?? null;
        $this->title = $values['title'];
        $this->userData = $values['userData'] ?? null;
        $this->videoModel = $values['videoModel'] ?? null;
        $this->vncKeymap = $values['vncKeymap'] ?? null;
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
