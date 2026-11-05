<?php

namespace Upcloud\Types;

enum FileStorageServiceCurrentStateResponseOperationalState: string
{
    case Running = "running";
    case Stopped = "stopped";
}
