<?php

namespace Upcloud\Server\Types;

enum ModifyServerServerFirewallPrivateDefaultOutgoingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
