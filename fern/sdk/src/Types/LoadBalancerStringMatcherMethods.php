<?php

namespace Upcloud\Types;

enum LoadBalancerStringMatcherMethods: string
{
    case Exact = "exact";
    case Substring = "substring";
    case Regexp = "regexp";
    case Starts = "starts";
    case Ends = "ends";
    case Domain = "domain";
}
