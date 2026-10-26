<?php

namespace Upcloud\Server\Types;

enum ModifyServerServerFirewallPublicDefaultIncomingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
