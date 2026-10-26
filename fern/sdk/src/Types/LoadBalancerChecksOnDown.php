<?php

namespace Upcloud\Types;

enum LoadBalancerChecksOnDown: string
{
    case Empty = "";
    case ShutdownSessions = "shutdown-sessions";
}
