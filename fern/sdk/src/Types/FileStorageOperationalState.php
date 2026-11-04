<?php

namespace Upcloud\Types;

enum FileStorageOperationalState: string
{
    case Pending = "pending";
    case SetupNetwork = "setup-network";
    case SetupInstance = "setup-instance";
    case SetupCheckup = "setup-checkup";
    case Running = "running";
    case Stopped = "stopped";
    case DeleteInstance = "delete-instance";
    case DeleteNetwork = "delete-network";
    case Deleting = "deleting";
}
