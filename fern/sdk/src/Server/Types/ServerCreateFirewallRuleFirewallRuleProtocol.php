<?php

namespace Upcloud\Server\Types;

enum ServerCreateFirewallRuleFirewallRuleProtocol: string
{
    case Tcp = "tcp";
    case Udp = "udp";
    case Icmp = "icmp";
}
