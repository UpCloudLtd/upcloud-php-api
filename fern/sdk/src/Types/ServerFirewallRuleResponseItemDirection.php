<?php

namespace Upcloud\Types;

enum ServerFirewallRuleResponseItemDirection: string
{
    case In = "in";
    case Out = "out";
}
