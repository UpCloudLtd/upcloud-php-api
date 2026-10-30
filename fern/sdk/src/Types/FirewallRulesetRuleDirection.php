<?php

namespace Upcloud\Types;

enum FirewallRulesetRuleDirection: string
{
    case In = "in";
    case Out = "out";
}
