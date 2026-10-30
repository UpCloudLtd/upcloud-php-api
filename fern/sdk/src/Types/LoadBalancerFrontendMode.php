<?php

namespace Upcloud\Types;

enum LoadBalancerFrontendMode: string
{
    case Http = "http";
    case Tcp = "tcp";
}
