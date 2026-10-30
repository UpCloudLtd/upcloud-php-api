<?php

namespace Upcloud\Types;

enum ServerFirewallRuleItemDirection: string
{
    case In = "in";
    case Out = "out";
}
