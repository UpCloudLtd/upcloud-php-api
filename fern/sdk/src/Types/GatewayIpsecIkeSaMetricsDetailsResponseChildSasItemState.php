<?php

namespace Upcloud\Types;

enum GatewayIpsecIkeSaMetricsDetailsResponseChildSasItemState: string
{
    case Created = "created";
    case Routed = "routed";
    case Installing = "installing";
    case Installed = "installed";
    case Updating = "updating";
    case Rekeyed = "rekeyed";
    case Rekeying = "rekeying";
    case Retrying = "retrying";
    case Deleting = "deleting";
    case Deleted = "deleted";
    case Destroying = "destroying";
    case Unavailable = "unavailable";
    case Unknown = "unknown";
}
