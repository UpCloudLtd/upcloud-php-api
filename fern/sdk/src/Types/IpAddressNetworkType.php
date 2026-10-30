<?php

namespace Upcloud\Types;

enum IpAddressNetworkType: string
{
    case Public_ = "public";
    case Utility = "utility";
    case Private_ = "private";
}
