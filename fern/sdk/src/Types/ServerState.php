<?php

namespace Upcloud\Types;

enum ServerState: string
{
    case Started = "started";
    case Stopped = "stopped";
    case Maintenance = "maintenance";
    case Error = "error";
    case PendingDelete = "pending_delete";
}
