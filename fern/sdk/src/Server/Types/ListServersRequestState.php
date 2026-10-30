<?php

namespace Upcloud\Server\Types;

enum ListServersRequestState: string
{
    case Started = "started";
    case Stopped = "stopped";
    case Maintenance = "maintenance";
    case Error = "error";
}
