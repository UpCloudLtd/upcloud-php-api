<?php

namespace Upcloud\Types;

enum IpAddressIpReleasePolicy: string
{
    case Release = "release";
    case Keep = "keep";
}
