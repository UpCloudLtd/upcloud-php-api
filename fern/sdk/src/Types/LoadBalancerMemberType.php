<?php

namespace Upcloud\Types;

enum LoadBalancerMemberType: string
{
    case Static_ = "static";
    case Dynamic = "dynamic";
}
