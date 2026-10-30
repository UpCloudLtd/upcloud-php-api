<?php

namespace Upcloud\Types;

enum ServerDetailsFirewallPrivateDefaultIncomingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
