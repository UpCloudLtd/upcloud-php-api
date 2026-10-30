<?php

namespace Upcloud\Types;

enum ServerDetailsFirewallPublicDefaultIncomingAction: string
{
    case Accept = "accept";
    case Drop = "drop";
}
