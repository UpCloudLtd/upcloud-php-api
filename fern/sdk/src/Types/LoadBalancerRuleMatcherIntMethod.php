<?php

namespace Upcloud\Types;

enum LoadBalancerRuleMatcherIntMethod: string
{
    case Range = "range";
    case Equal = "equal";
    case GreaterOrEqual = "greater_or_equal";
    case Greater = "greater";
    case LessOrEqual = "less_or_equal";
    case Less = "less";
}
