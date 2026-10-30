<?php

namespace Upcloud\Types;

enum StorageState: string
{
    case Online = "online";
    case Maintenance = "maintenance";
    case Error = "error";
    case PendingDelete = "pending_delete";
    case Hidden = "hidden";
    case Cloning = "cloning";
    case Backuping = "backuping";
    case Attaching = "attaching";
    case Detaching = "detaching";
    case Syncing = "syncing";
}
