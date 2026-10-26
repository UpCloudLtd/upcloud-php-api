<?php

namespace Upcloud\Server\Types;

enum ServerCreateFirewallRuleFirewallRuleFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
