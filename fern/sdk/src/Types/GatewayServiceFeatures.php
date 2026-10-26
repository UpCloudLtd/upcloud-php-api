<?php

namespace Upcloud\Types;

enum GatewayServiceFeatures: string
{
    case Nat = "nat";
    case Vpn = "vpn";
}
