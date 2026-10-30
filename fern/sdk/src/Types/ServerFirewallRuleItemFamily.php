<?php

namespace Upcloud\Types;

enum ServerFirewallRuleItemFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
