<?php

namespace Upcloud\Server\Types;

enum ModifyServerServerFirewallPrivateDefaultIncomingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
