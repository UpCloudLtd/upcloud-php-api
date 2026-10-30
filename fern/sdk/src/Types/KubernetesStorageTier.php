<?php

namespace Upcloud\Types;

enum KubernetesStorageTier: string
{
    case Maxiops = "maxiops";
    case Hdd = "hdd";
    case Standard = "standard";
}
