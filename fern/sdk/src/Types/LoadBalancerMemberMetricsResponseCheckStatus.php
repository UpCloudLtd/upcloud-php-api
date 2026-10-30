<?php

namespace Upcloud\Types;

enum LoadBalancerMemberMetricsResponseCheckStatus: string
{
    case Checking = "checking";
    case Failed = "failed";
    case Passing = "passing";
    case Unknown = "unknown";
}
