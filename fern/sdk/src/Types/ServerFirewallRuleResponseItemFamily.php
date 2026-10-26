<?php

namespace Upcloud\Types;

enum ServerFirewallRuleResponseItemFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
    case Empty = "";
}
