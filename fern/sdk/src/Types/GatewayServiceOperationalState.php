<?php

namespace Upcloud\Types;

enum GatewayServiceOperationalState: string
{
    case Pending = "pending";
    case SetupAgent = "setup-agent";
    case SetupLinkNetwork = "setup-link-network";
    case SetupService = "setup-service";
    case SetupNetwork = "setup-network";
    case SetupGw = "setup-gw";
    case Checkup = "checkup";
    case SetupDns = "setup-dns";
    case Running = "running";
    case Stopped = "stopped";
    case DeleteDns = "delete-dns";
    case DeleteGw = "delete-gw";
    case DeleteNetwork = "delete-network";
    case DeleteServer = "delete-server";
    case DeleteLinkNetwork = "delete-link-network";
    case DeleteService = "delete-service";
    case DetachLinkNetwork = "detach-link-network";
}
