<?php

namespace Upcloud\Types;

enum FileStorageConfiguredStatus: string
{
    case Started = "started";
    case Stopped = "stopped";
}
