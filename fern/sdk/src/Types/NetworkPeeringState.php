<?php

namespace Upcloud\Types;

enum NetworkPeeringState: string
{
    case Active = "active";
    case PendingPeer = "pending-peer";
    case Provisioning = "provisioning";
    case ConflictSubnet = "conflict-subnet";
    case MissingLocalRouter = "missing-local-router";
    case MissingPeerRouter = "missing-peer-router";
    case DeletedPeerNetwork = "deleted-peer-network";
    case Disabled = "disabled";
    case PeerDisabled = "peer-disabled";
    case Error = "error";
}
