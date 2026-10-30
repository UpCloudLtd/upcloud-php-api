<?php

namespace Upcloud\Types;

enum KubernetesClusterUpgradeStrategyType: string
{
    case RollingUpdate = "rolling-update";
    case Manual = "manual";
}
