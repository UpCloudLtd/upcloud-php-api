<?php

namespace Upcloud\Types;

enum ObjectStorage2JobResponseOperationalState: string
{
    case Pending = "pending";
    case Configuring = "configuring";
    case Running = "running";
    case Completed = "completed";
    case Failed = "failed";
    case Canceled = "canceled";
}
