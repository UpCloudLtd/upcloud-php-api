<?php

namespace Upcloud\Types;

enum LoadBalancerMatchStringResponseMethod: string
{
    case Equal = "equal";
    case Contains = "contains";
    case StartsWith = "starts_with";
    case EndsWith = "ends_with";
    case Regex = "regex";
}
