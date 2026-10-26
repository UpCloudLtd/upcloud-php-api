<?php

namespace Upcloud\Types;

enum LoadBalancerCertificateBundleTlsType: string
{
    case Manual = "manual";
    case Dynamic = "dynamic";
    case Authority = "authority";
}
