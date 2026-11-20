<?php

namespace Upcloud\Types;

enum ContainerRegistryConfiguredStatus: string
{
    case Started = "started";
    case Stopped = "stopped";
}
