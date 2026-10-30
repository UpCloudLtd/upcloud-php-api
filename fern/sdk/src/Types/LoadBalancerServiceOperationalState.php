<?php

namespace Upcloud\Types;

enum LoadBalancerServiceOperationalState: string
{
    case Pending = "pending";
    case Running = "running";
    case Failing = "failing";
    case Stopped = "stopped";
    case Degraded = "degraded";
}
