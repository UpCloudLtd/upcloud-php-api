<?php

namespace Upcloud\Types;

enum LoadBalancerMatchingCondition: string
{
    case And_ = "and";
    case Or_ = "or";
}
