<?php

namespace Upcloud\Types;

enum DatabaseNetworkFamily: string
{
    case IPv4 = "IPv4";
    case IPv6 = "IPv6";
}
