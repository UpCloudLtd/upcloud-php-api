<?php

namespace Upcloud\Types;

enum ServerFirewallRuleResponseItemProtocol: string
{
    case Tcp = "tcp";
    case Udp = "udp";
    case Icmp = "icmp";
    case Empty = "";
}
