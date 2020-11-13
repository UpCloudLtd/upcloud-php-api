<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class Server
{

    const BOOT_ORDER_DISK = 'disk';
    const BOOT_ORDER_CDROM = 'cdrom';
    const BOOT_ORDER_DISKCDROM = 'disk,cdrom';
    const BOOT_ORDER_CDROMDISK = 'cdrom,disk';

    const FIREWALL_ON = 'on';
    const FIREWALL_OFF = 'off';

    const VIDEO_MODEL_VGA = 'vga';
    const VIDEO_MODEL_CIRRUS = 'cirrus';

    const NIC_MODEL_VIRTIO = 'virtio';
    const NIC_MODEL_E1000 = 'e1000';
    const NIC_MODEL_RTL8139 = 'rtl8139';

    const REMOTE_ACCESS_TYPE_VNC = 'vnc';
    const REMOTE_ACCESS_TYPE_SPICE = 'spice';

    const REMOTE_ACCESS_ENABLED_YES = 'yes';
    const REMOTE_ACCESS_ENABLED_NO = 'no';

    const METADATA_YES = 'yes';
    const METADATA_NO = 'no';

    const PASSWORD_DELIVERY_NONE = 'none';
    const PASSWORD_DELIVERY_EMAIL = 'email';
    const PASSWORD_DELIVERY_SMS = 'sms';

    /**
     * @var string|float|null
     */
    private $avoidHost;

    /**
     * @var string|null
     */
    private $bootOrder;

    /**
     * @var string|float|null
     */
    private $coreNumber;

    /**
     * @var string
     */
    private $firewall;

    /**
     * @var float|string|null
     */
    private $host;

    /**
     * @var string|null
     */
    private $hostname;

    /**
     * @var NetworkInterfaceList|null
     */
    private $networking;

    /**
     * @var ServerLoginUser|null
     */
    private $loginUser;

    /**
     * @var IpAddresses|null
     */
    private $ipAddresses;

    /**
     * @var float|string|null
     */
    private $license;

    /**
     * @var float|string|null
     */
    private $memoryAmount;

    /**
     * @var string|null
     */
    private $metadata;

    /**
     * @var string
     */
    private $nicModel;

    /**
     * @var string|null
     */
    private $passwordDelivery;

    /**
     * @var string
     */
    private $plan;

    /**
     * @var string|float|null
     */
    private $planIpv4Bytes;

    /**
     * @var string|float|null
     */
    private $planIpv6Bytes;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var ServerStorageDevices|null
     */
    private $storageDevices;

    /**
     * @var ServerTags|null
     */
    private $tags;

    /**
     * @var string|null
     */
    private $timezone;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $uuid;

    /**
     * @var string|null
     */
    private $userData;

    /**
     * @var string
     */
    private $videoModel;

    /**
     * @var string
     */
    private $remoteAccessType;

    /**
     * @var string
     */
    private $remoteAccessEnabled;

    /**
     * @var string|null
     */
    private $remoteAccessPassword;

    /**
     * @var string|null
     */
    private $simpleBackup;

    /**
     * @var string|null
     */
    private $zone;

    /**
     * Constructor
     * @param mixed[] $data
     */

    public function __construct(array $data = null)
    {
        $this->setAvoidHost($data['avoid_host'] ?? null);
        $this->setBootOrder($data['boot_order'] ?? null);
        $this->setCoreNumber($data['core_number'] ?? null);
        $this->setFirewall($data['firewall'] ?? self::FIREWALL_ON);
        $this->setHost($data['host'] ?? null);
        $this->setHostname($data['hostname'] ?? null);
        $this->setNetworking($data['networking'] ?? null);
        $this->setLoginUser($data['login_user'] ?? null);
        $this->setIpAddresses($data['ip_addresses'] ?? null);
        $this->setLicense($data['license'] ?? null);
        $this->setMemoryAmount($data['memory_amount'] ?? null);
        $this->setMetadata($data['metadata'] ?? null);
        $this->setNicModel($data['nic_model'] ?? self::NIC_MODEL_VIRTIO);
        $this->setPasswordDelivery($data['password_delivery'] ?? null);
        $this->setPlan($data['plan'] ?? 'custom');
        $this->setPlanIpv4Bytes($data['plan_ipv4_bytes'] ?? null);
        $this->setPlanIpv6Bytes($data['plan_ipv6_bytes'] ?? null);
        $this->setState($data['state'] ?? null);
        $this->setStorageDevices($data['storage_devices'] ?? null);
        $this->setTags($data['tags'] ?? null);
        $this->setTimezone($data['timezone'] ?? null);
        $this->setTitle($data['title'] ?? null);
        $this->setUuid($data['uuid'] ?? null);
        $this->setUserData($data['user_data'] ?? null);
        $this->setVideoModel($data['video_model'] ?? self::VIDEO_MODEL_VGA);
        $this->setRemoteAccessType($data['remote_access_type'] ??  self::REMOTE_ACCESS_TYPE_VNC);
        $this->setRemoteAccessEnabled($data['remote_access_enabled'] ?? self::REMOTE_ACCESS_ENABLED_NO);
        $this->setRemoteAccessPassword($data['remote_access_password'] ?? null);
        $this->setSimpleBackup($data['simple_backup'] ?? null);
        $this->setZone($data['zone'] ?? null);
    }

    /**
     * @return float|string|null
     */
    public function getAvoidHost()
    {
        return $this->avoidHost;
    }

    /**
     * @param float|string|null $avoidHost
     * @return Server
     */
    public function setAvoidHost($avoidHost): Server
    {
        $this->avoidHost = $avoidHost;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBootOrder(): ?string
    {
        return $this->bootOrder;
    }

    /**
     * @param string|null $bootOrder
     * @return Server
     */
    public function setBootOrder(?string $bootOrder): Server
    {
        if (!is_null($bootOrder)) {
            Assert::oneOf($bootOrder, [
                 self::BOOT_ORDER_DISK,
                self::BOOT_ORDER_CDROM,
                self::BOOT_ORDER_DISKCDROM,
                self::BOOT_ORDER_CDROMDISK
            ]);
        }
        $this->bootOrder = $bootOrder;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getCoreNumber()
    {
        return $this->coreNumber;
    }

    /**
     * @param float|string|null $coreNumber
     * @return Server
     */
    public function setCoreNumber($coreNumber): Server
    {
        $this->coreNumber = $coreNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirewall(): string
    {
        return $this->firewall;
    }

    /**
     * @param string $firewall
     * @return Server
     */
    public function setFirewall(string $firewall): Server
    {
        Assert::oneOf($firewall, [
            self::FIREWALL_ON,
            self::FIREWALL_OFF
        ]);

        $this->firewall = $firewall;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param float|string|null $host
     * @return Server
     */
    public function setHost($host): Server
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHostname(): ?string
    {
        return $this->hostname;
    }

    /**
     * @param string|null $hostname
     * @return Server
     */
    public function setHostname(?string $hostname): Server
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * @return NetworkInterfaceList|null
     */
    public function getNetworking(): ?NetworkInterfaceList
    {
        return $this->networking;
    }

    /**
     * @param NetworkInterfaceList|array|null $networking
     * @return Server
     */
    public function setNetworking($networking): Server
    {
        if (is_array($networking)) {
            $this->networking = new NetworkInterfaceList($networking);
        } else {
            $this->networking = $networking;
        }
        return $this;
    }

    /**
     * @return ServerLoginUser|null
     */
    public function getLoginUser(): ?ServerLoginUser
    {
        return $this->loginUser;
    }

    /**
     * @param ServerLoginUser|array|null $loginUser
     * @return Server
     */
    public function setLoginUser($loginUser): Server
    {
        if (is_array($loginUser)) {
            $this->loginUser = new ServerLoginUser($loginUser);
        } else {
            $this->loginUser = $loginUser;
        }

        return $this;
    }

    /**
     * @return IpAddresses|null
     */
    public function getIpAddresses(): ?IpAddresses
    {
        return $this->ipAddresses;
    }

    /**
     * @param IpAddresses|array|null $ipAddresses
     * @return Server
     */
    public function setIpAddresses($ipAddresses): Server
    {
        if (is_array($ipAddresses)) {
            $this->ipAddresses = new IpAddresses($ipAddresses);
        } else {
            $this->ipAddresses = $ipAddresses;
        }

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param float|string|null $license
     * @return Server
     */
    public function setLicense($license): Server
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getMemoryAmount()
    {
        return $this->memoryAmount;
    }

    /**
     * @param float|string|null $memoryAmount
     * @return Server
     */
    public function setMemoryAmount($memoryAmount): Server
    {
        $this->memoryAmount = $memoryAmount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * @param string|null $metadata
     * @return Server
     */
    public function setMetadata(?string $metadata): Server
    {
        if (!is_null($metadata)) {
            Assert::oneOf($metadata, [
                self::METADATA_YES,
                self::METADATA_NO
            ]);
        }
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return string
     */
    public function getNicModel(): string
    {
        return $this->nicModel;
    }

    /**
     * @param string $nicModel
     * @return Server
     */
    public function setNicModel(string $nicModel): Server
    {
        Assert::oneOf($nicModel, [
            self::NIC_MODEL_VIRTIO,
            self::NIC_MODEL_E1000,
            self::NIC_MODEL_RTL8139
        ]);

        $this->nicModel = $nicModel;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPasswordDelivery(): ?string
    {
        return $this->passwordDelivery;
    }

    /**
     * @param string|null $passwordDelivery
     * @return Server
     */
    public function setPasswordDelivery(?string $passwordDelivery): Server
    {
        if (!is_null($passwordDelivery)) {
            Assert::oneOf($passwordDelivery, [
                self::PASSWORD_DELIVERY_NONE,
                self::PASSWORD_DELIVERY_EMAIL,
                self::PASSWORD_DELIVERY_SMS
            ]);
        }

        $this->passwordDelivery = $passwordDelivery;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlan(): string
    {
        return $this->plan;
    }

    /**
     * @param string $plan
     * @return Server
     */
    public function setPlan(string $plan): Server
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getPlanIpv4Bytes()
    {
        return $this->planIpv4Bytes;
    }

    /**
     * @param float|string|null $planIpv4Bytes
     * @return Server
     */
    public function setPlanIpv4Bytes($planIpv4Bytes): Server
    {
        $this->planIpv4Bytes = $planIpv4Bytes;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getPlanIpv6Bytes()
    {
        return $this->planIpv6Bytes;
    }

    /**
     * @param float|string|null $planIpv6Bytes
     * @return Server
     */
    public function setPlanIpv6Bytes($planIpv6Bytes): Server
    {
        $this->planIpv6Bytes = $planIpv6Bytes;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Server
     */
    public function setState(?string $state): Server
    {
        if (!is_null($state)) {
            Assert::oneOf($state, ServerState::getAllowableEnumValues());
        }

        $this->state = $state;

        return $this;
    }

    /**
     * @return ServerStorageDevices|null
     */
    public function getStorageDevices(): ?ServerStorageDevices
    {
        return $this->storageDevices;
    }

    /**
     * @param ServerStorageDevices|array|null $storageDevices
     * @return Server
     */
    public function setStorageDevices($storageDevices): Server
    {
        if (is_array($storageDevices)) {
            $this->storageDevices = new ServerStorageDevices($storageDevices);
        } else {
            $this->storageDevices = $storageDevices;
        }

        return $this;
    }

    /**
     * @return ServerTags|null
     */
    public function getTags(): ?ServerTags
    {
        return $this->tags;
    }

    /**
     * @param ServerTags|array|null $tags
     * @return Server
     */
    public function setTags($tags): Server
    {
        if (is_array($tags)) {
            $this->tags = new ServerTags($tags);
        } else {
            $this->tags = $tags;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param string|null $timezone
     * @return Server
     */
    public function setTimezone(?string $timezone): Server
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Server
     */
    public function setTitle(?string $title): Server
    {
        if (!is_null($title)) {
            Assert::maxLength($title, 64);
        }

        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return Server
     */
    public function setUuid(?string $uuid): Server
    {
        if (!is_null($uuid)) {
            Assert::uuid($uuid);
        }

        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserData(): ?string
    {
        return $this->userData;
    }

    /**
     * @param string|null $userData
     * @return Server
     */
    public function setUserData(?string $userData): Server
    {
        $this->userData = $userData;

        return $this;
    }

    /**
     * @return string
     */
    public function getVideoModel(): string
    {
        return $this->videoModel;
    }

    /**
     * @param string $videoModel
     * @return Server
     */
    public function setVideoModel(string $videoModel): Server
    {
        Assert::oneOf($videoModel, [
             self::VIDEO_MODEL_VGA,
            self::VIDEO_MODEL_CIRRUS
        ]);

        $this->videoModel = $videoModel;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteAccessType(): string
    {
        return $this->remoteAccessType;
    }

    /**
     * @param string $remoteAccessType
     * @return Server
     */
    public function setRemoteAccessType(string $remoteAccessType): Server
    {
        Assert::oneOf($remoteAccessType, [
            self::REMOTE_ACCESS_TYPE_VNC,
            self::REMOTE_ACCESS_TYPE_SPICE
        ]);

        $this->remoteAccessType = $remoteAccessType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteAccessEnabled(): string
    {
        return $this->remoteAccessEnabled;
    }

    /**
     * @param string $remoteAccessEnabled
     * @return Server
     */
    public function setRemoteAccessEnabled(string $remoteAccessEnabled): Server
    {
        Assert::oneOf($remoteAccessEnabled, [
            self::REMOTE_ACCESS_ENABLED_YES,
            self::REMOTE_ACCESS_ENABLED_NO
        ]);

        $this->remoteAccessEnabled = $remoteAccessEnabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRemoteAccessPassword(): ?string
    {
        return $this->remoteAccessPassword;
    }

    /**
     * @param string|null $remoteAccessPassword
     * @return Server
     */
    public function setRemoteAccessPassword(?string $remoteAccessPassword): Server
    {
        $this->remoteAccessPassword = $remoteAccessPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSimpleBackup(): ?string
    {
        return $this->simpleBackup;
    }

    /**
     * @param string|null $simpleBackup
     * @return Server
     */
    public function setSimpleBackup(?string $simpleBackup): Server
    {
        $this->simpleBackup = $simpleBackup;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZone(): ?string
    {
        return $this->zone;
    }

    /**
     * @param string|null $zone
     * @return Server
     */
    public function setZone(?string $zone): Server
    {
        $this->zone = $zone;

        return $this;
    }

}


