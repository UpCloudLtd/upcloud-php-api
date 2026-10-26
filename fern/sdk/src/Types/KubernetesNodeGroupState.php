<?php

namespace Upcloud\Types;

enum KubernetesNodeGroupState: string
{
    case Failed = "failed";
    case Pending = "pending";
    case Running = "running";
    case Terminating = "terminating";
    case Unknown = "unknown";
    case ScalingUp = "scaling-up";
    case ScalingDown = "scaling-down";
}
