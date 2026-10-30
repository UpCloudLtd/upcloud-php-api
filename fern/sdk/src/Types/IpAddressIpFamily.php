<?php

namespace Upcloud\Types;

enum IpAddressIpFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
