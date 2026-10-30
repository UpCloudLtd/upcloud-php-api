<?php

namespace Upcloud\Types;

enum GatewayIpsecIkeSaMetricsDetailsResponseOperationalState: string
{
    case Idle = "idle";
    case Connecting = "connecting";
    case Established = "established";
    case Destroying = "destroying";
    case Unknown = "unknown";
}
