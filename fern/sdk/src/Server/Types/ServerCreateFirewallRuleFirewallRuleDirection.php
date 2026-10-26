<?php

namespace Upcloud\Server\Types;

enum ServerCreateFirewallRuleFirewallRuleDirection: string
{
    case In = "in";
    case Out = "out";
}
