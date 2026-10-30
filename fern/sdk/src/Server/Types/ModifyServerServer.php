<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ServerBooleanOnoff;
use Upcloud\Types\ServerLabels;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Types\ServerNicModel;
use Upcloud\Types\ServerRemoteAccessEnabled;
use Upcloud\Types\ServerRemoteAccessType;

class ModifyServerServer extends JsonSerializableType
{
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
     * @var ?value-of<ServerBooleanOnoff> $firewallPrivate
     */
    #[JsonProperty('firewall_private')]
    public ?string $firewallPrivate;

    /**
     * @var ?value-of<ModifyServerServerFirewallPrivateDefaultIncomingAction> $firewallPrivateDefaultIncomingAction
     */
    #[JsonProperty('firewall_private_default_incoming_action')]
    public ?string $firewallPrivateDefaultIncomingAction;

    /**
     * @var ?value-of<ModifyServerServerFirewallPrivateDefaultOutgoingAction> $firewallPrivateDefaultOutgoingAction
     */
    #[JsonProperty('firewall_private_default_outgoing_action')]
    public ?string $firewallPrivateDefaultOutgoingAction;

    /**
     * @var ?value-of<ModifyServerServerFirewallPublicDefaultIncomingAction> $firewallPublicDefaultIncomingAction
     */
    #[JsonProperty('firewall_public_default_incoming_action')]
    public ?string $firewallPublicDefaultIncomingAction;

    /**
     * @var ?value-of<ModifyServerServerFirewallPublicDefaultOutgoingAction> $firewallPublicDefaultOutgoingAction
     */
    #[JsonProperty('firewall_public_default_outgoing_action')]
    public ?string $firewallPublicDefaultOutgoingAction;

    /**
     * @var ?string $hostname
     */
    #[JsonProperty('hostname')]
    public ?string $hostname;

    /**
     * @var ?ServerLabels $labels
     */
    #[JsonProperty('labels')]
    public ?ServerLabels $labels;

    /**
     * @var ?int $memoryAmount
     */
    #[JsonProperty('memory_amount')]
    public ?int $memoryAmount;

    /**
     * @var ?value-of<ServerBooleanYesno> $metadata
     */
    #[JsonProperty('metadata')]
    public ?string $metadata;

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
     * @var ?string $simpleBackup
     */
    #[JsonProperty('simple_backup')]
    public ?string $simpleBackup;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

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
     * @param array{
     *   bootOrder?: ?string,
     *   coreNumber?: ?int,
     *   firewall?: ?value-of<ServerBooleanOnoff>,
     *   firewallPrivate?: ?value-of<ServerBooleanOnoff>,
     *   firewallPrivateDefaultIncomingAction?: ?value-of<ModifyServerServerFirewallPrivateDefaultIncomingAction>,
     *   firewallPrivateDefaultOutgoingAction?: ?value-of<ModifyServerServerFirewallPrivateDefaultOutgoingAction>,
     *   firewallPublicDefaultIncomingAction?: ?value-of<ModifyServerServerFirewallPublicDefaultIncomingAction>,
     *   firewallPublicDefaultOutgoingAction?: ?value-of<ModifyServerServerFirewallPublicDefaultOutgoingAction>,
     *   hostname?: ?string,
     *   labels?: ?ServerLabels,
     *   memoryAmount?: ?int,
     *   metadata?: ?value-of<ServerBooleanYesno>,
     *   nicModel?: ?value-of<ServerNicModel>,
     *   plan?: ?string,
     *   remoteAccessEnabled?: ?value-of<ServerRemoteAccessEnabled>,
     *   remoteAccessPassword?: ?string,
     *   remoteAccessType?: ?value-of<ServerRemoteAccessType>,
     *   simpleBackup?: ?string,
     *   timezone?: ?string,
     *   title?: ?string,
     *   videoModel?: ?string,
     *   vncKeymap?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bootOrder = $values['bootOrder'] ?? null;
        $this->coreNumber = $values['coreNumber'] ?? null;
        $this->firewall = $values['firewall'] ?? null;
        $this->firewallPrivate = $values['firewallPrivate'] ?? null;
        $this->firewallPrivateDefaultIncomingAction = $values['firewallPrivateDefaultIncomingAction'] ?? null;
        $this->firewallPrivateDefaultOutgoingAction = $values['firewallPrivateDefaultOutgoingAction'] ?? null;
        $this->firewallPublicDefaultIncomingAction = $values['firewallPublicDefaultIncomingAction'] ?? null;
        $this->firewallPublicDefaultOutgoingAction = $values['firewallPublicDefaultOutgoingAction'] ?? null;
        $this->hostname = $values['hostname'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->memoryAmount = $values['memoryAmount'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->nicModel = $values['nicModel'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->remoteAccessEnabled = $values['remoteAccessEnabled'] ?? null;
        $this->remoteAccessPassword = $values['remoteAccessPassword'] ?? null;
        $this->remoteAccessType = $values['remoteAccessType'] ?? null;
        $this->simpleBackup = $values['simpleBackup'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->videoModel = $values['videoModel'] ?? null;
        $this->vncKeymap = $values['vncKeymap'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
