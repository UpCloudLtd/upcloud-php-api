<?php

namespace Upcloud\Types;

enum LoadBalancerServiceConfiguredStatus: string
{
    case Started = "started";
    case Stopped = "stopped";
}
