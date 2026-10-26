<?php

namespace Upcloud\Types;

enum LoadBalancerCertificateBundleKeyType: string
{
    case Rsa = "rsa";
    case Ecdsa = "ecdsa";
}
