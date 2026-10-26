<?php

namespace Upcloud\Types;

enum ServerFirewallRuleItemProtocol: string
{
    case Tcp = "tcp";
    case Udp = "udp";
    case Icmp = "icmp";
}
