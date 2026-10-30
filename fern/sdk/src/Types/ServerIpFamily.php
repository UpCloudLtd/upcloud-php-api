<?php

namespace Upcloud\Types;

enum ServerIpFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
