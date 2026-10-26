<?php

namespace Upcloud\Types;

enum ServerFirewallRuleResponseItemAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
