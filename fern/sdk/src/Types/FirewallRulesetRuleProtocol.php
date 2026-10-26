<?php

namespace Upcloud\Types;

enum FirewallRulesetRuleProtocol: string
{
    case Tcp = "tcp";
    case Udp = "udp";
    case Icmp = "icmp";
    case Esp = "esp";
    case Ah = "ah";
    case All = "all";
    case Empty = "";
}
