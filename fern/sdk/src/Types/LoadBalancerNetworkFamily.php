<?php

namespace Upcloud\Types;

enum LoadBalancerNetworkFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
