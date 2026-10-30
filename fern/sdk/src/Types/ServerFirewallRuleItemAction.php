<?php

namespace Upcloud\Types;

enum ServerFirewallRuleItemAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
