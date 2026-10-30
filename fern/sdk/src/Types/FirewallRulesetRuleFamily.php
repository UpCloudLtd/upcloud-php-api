<?php

namespace Upcloud\Types;

enum FirewallRulesetRuleFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
    case Empty = "";
}
