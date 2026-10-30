<?php

namespace Upcloud\Types;

enum LoadBalancerActionHttpRedirectCreateSchemeScheme: string
{
    case Http = "http";
    case Https = "https";
}
