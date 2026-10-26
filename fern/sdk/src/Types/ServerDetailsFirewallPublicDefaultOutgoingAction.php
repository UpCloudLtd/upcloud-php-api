<?php

namespace Upcloud\Types;

enum ServerDetailsFirewallPublicDefaultOutgoingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
