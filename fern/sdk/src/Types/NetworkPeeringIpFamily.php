<?php

namespace Upcloud\Types;

enum NetworkPeeringIpFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
