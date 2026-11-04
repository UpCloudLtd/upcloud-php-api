<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Details of a private cloud host.
 */
class HostDetails extends JsonSerializableType
{
    /**
     * @var int $id
     */
    #[JsonProperty('id')]
    public int $id;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var value-of<HostBooleanYesno> $windowsEnabled
     */
    #[JsonProperty('windows_enabled')]
    public string $windowsEnabled;

    /**
     * @var HostStats $stats
     */
    #[JsonProperty('stats')]
    public HostStats $stats;

    /**
     * @var ?HostDevices $devices
     */
    #[JsonProperty('devices')]
    public ?HostDevices $devices;

    /**
     * @var ?HostPassthroughDevices $passthroughDevices
     */
    #[JsonProperty('passthrough_devices')]
    public ?HostPassthroughDevices $passthroughDevices;

    /**
     * @param array{
     *   id: int,
     *   description: string,
     *   zone: string,
     *   windowsEnabled: value-of<HostBooleanYesno>,
     *   stats: HostStats,
     *   devices?: ?HostDevices,
     *   passthroughDevices?: ?HostPassthroughDevices,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->description = $values['description'];
        $this->zone = $values['zone'];
        $this->windowsEnabled = $values['windowsEnabled'];
        $this->stats = $values['stats'];
        $this->devices = $values['devices'] ?? null;
        $this->passthroughDevices = $values['passthroughDevices'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
