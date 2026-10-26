<?php

namespace Upcloud\NetworkPeering\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class ListNetworkPeeringsRequest extends JsonSerializableType
{
    /**
     * @var ?string $uuid Filter by network peering UUID.
     */
    public ?string $uuid;

    /**
     * @var ?string $networkUuidLocal Filter by local network uuid.
     */
    public ?string $networkUuidLocal;

    /**
     * @var ?string $networkUuidPeer Filter by peer network uuid.
     */
    public ?string $networkUuidPeer;

    /**
     * @var ?string $label Label filter in the form key=value. Can be specified multiple times to filter by multiple labels.
     */
    public ?string $label;

    /**
     * @param array{
     *   uuid?: ?string,
     *   networkUuidLocal?: ?string,
     *   networkUuidPeer?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->networkUuidLocal = $values['networkUuidLocal'] ?? null;
        $this->networkUuidPeer = $values['networkUuidPeer'] ?? null;
        $this->label = $values['label'] ?? null;
    }
}
