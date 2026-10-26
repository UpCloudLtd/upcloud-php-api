<?php

namespace Upcloud\Types;

enum KubernetesNodeState: string
{
    case Pending = "pending";
    case Failed = "failed";
    case Running = "running";
    case Terminating = "terminating";
    case Unknown = "unknown";
}
