<?php

namespace Upcloud\Types;

enum LoadBalancerProxyProtocolVersionOrDisabled: string
{
    case V1 = "v1";
    case V2 = "v2";
    case Empty = "";
}
