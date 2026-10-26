<?php

namespace Upcloud\Storage\Types;

enum DeleteStorageRequestBackups: string
{
    case Keep = "keep";
    case Delete = "delete";
    case KeepLatest = "keep_latest";
}
