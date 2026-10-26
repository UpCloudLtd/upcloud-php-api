<?php

namespace Upcloud\Types;

enum LoadBalancerStringMatcherMethodsNoValue: string
{
    case Exists = "exists";
    case Ip = "ip";
}
