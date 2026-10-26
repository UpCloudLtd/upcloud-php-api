<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ServerLegacyBoolean;

class ServerRebuildServerRebuild extends JsonSerializableType
{
    /**
     * @var string $cloneSource UUID of the public template used for the new system disk.
     */
    #[JsonProperty('clone_source')]
    public string $cloneSource;

    /**
     * @var ?value-of<ServerLegacyBoolean> $deleteDetachedDisk
     */
    #[JsonProperty('delete_detached_disk')]
    public ?string $deleteDetachedDisk;

    /**
     * @var ?string $detachDisk UUID of the storage to detach before rebuilding.
     */
    #[JsonProperty('detach_disk')]
    public ?string $detachDisk;

    /**
     * @var ?value-of<ServerLegacyBoolean> $encrypted
     */
    #[JsonProperty('encrypted')]
    public ?string $encrypted;

    /**
     * @var ?ServerRebuildServerRebuildLoginUser $loginUser
     */
    #[JsonProperty('login_user')]
    public ?ServerRebuildServerRebuildLoginUser $loginUser;

    /**
     * @var ?value-of<ServerRebuildServerRebuildPasswordDelivery> $passwordDelivery One-time password delivery method.
     */
    #[JsonProperty('password_delivery')]
    public ?string $passwordDelivery;

    /**
     * @var ?string $storageTitle Title of the new system storage.
     */
    #[JsonProperty('storage_title')]
    public ?string $storageTitle;

    /**
     * @var ?string $userData User data supplied to cloud-init.
     */
    #[JsonProperty('user_data')]
    public ?string $userData;

    /**
     * @param array{
     *   cloneSource: string,
     *   deleteDetachedDisk?: ?value-of<ServerLegacyBoolean>,
     *   detachDisk?: ?string,
     *   encrypted?: ?value-of<ServerLegacyBoolean>,
     *   loginUser?: ?ServerRebuildServerRebuildLoginUser,
     *   passwordDelivery?: ?value-of<ServerRebuildServerRebuildPasswordDelivery>,
     *   storageTitle?: ?string,
     *   userData?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cloneSource = $values['cloneSource'];
        $this->deleteDetachedDisk = $values['deleteDetachedDisk'] ?? null;
        $this->detachDisk = $values['detachDisk'] ?? null;
        $this->encrypted = $values['encrypted'] ?? null;
        $this->loginUser = $values['loginUser'] ?? null;
        $this->passwordDelivery = $values['passwordDelivery'] ?? null;
        $this->storageTitle = $values['storageTitle'] ?? null;
        $this->userData = $values['userData'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
