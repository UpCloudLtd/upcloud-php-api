<?php

namespace Upcloud\Types;

enum LoadBalancerHealthCheckType: string
{
    case Tcp = "tcp";
    case Http = "http";
}
