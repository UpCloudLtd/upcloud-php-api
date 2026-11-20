<?php

namespace Upcloud\Types;

enum GatewayIpsecMetricsIkeSaDetailsResponseInternalState: string
{
    case Uninitialized = "uninitialized";
    case Created = "created";
    case Connecting = "connecting";
    case Established = "established";
    case Passive = "passive";
    case Rekeying = "rekeying";
    case Rekeyed = "rekeyed";
    case Deleting = "deleting";
    case Destroying = "destroying";
    case Unavailable = "unavailable";
    case Unknown = "unknown";
}
