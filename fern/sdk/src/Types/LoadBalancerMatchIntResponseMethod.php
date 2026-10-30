<?php

namespace Upcloud\Types;

enum LoadBalancerMatchIntResponseMethod: string
{
    case Equal = "equal";
    case GreaterOrEqual = "greater_or_equal";
    case Greater = "greater";
    case LessOrEqual = "less_or_equal";
    case Less = "less";
}
