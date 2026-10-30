<?php

namespace Upcloud\Types;

enum LoadBalancerRuleMatchingCondition: string
{
    case And_ = "and";
    case Or_ = "or";
}
