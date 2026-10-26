<?php

namespace Upcloud\Types;

enum KubernetesClusterState: string
{
    case Failed = "failed";
    case Pending = "pending";
    case Running = "running";
    case Terminated = "terminated";
    case Terminating = "terminating";
    case Unknown = "unknown";
    case Suspended = "suspended";
    case Upgrading = "upgrading";
    case UpgradePending = "upgrade-pending";
    case UpgradeFailed = "upgrade-failed";
}
