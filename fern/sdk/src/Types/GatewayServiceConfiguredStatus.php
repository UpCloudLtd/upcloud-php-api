<?php

namespace Upcloud\Types;

enum GatewayServiceConfiguredStatus: string
{
    case Started = "started";
    case Stopped = "stopped";
}
