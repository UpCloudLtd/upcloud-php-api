<?php

namespace Upcloud\Types;

enum LoadBalancerMemberMetricsResponseStatus: string
{
    case Up = "up";
    case Down = "down";
    case Unknown = "unknown";
    case Maint = "maint";
    case Drain = "drain";
}
