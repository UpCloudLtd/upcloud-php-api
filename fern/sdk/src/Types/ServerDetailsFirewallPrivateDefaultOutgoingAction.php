<?php

namespace Upcloud\Types;

enum ServerDetailsFirewallPrivateDefaultOutgoingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
