<?php

namespace Upcloud\Server\Types;

enum ServerCreateFirewallRuleFirewallRuleAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
