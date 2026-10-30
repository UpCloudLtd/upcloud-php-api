<?php

namespace Upcloud\Server\Types;

enum ModifyServerServerFirewallPublicDefaultOutgoingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
