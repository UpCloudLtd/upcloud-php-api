<?php

namespace Upcloud\Types;

enum FirewallRulesetRuleAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
