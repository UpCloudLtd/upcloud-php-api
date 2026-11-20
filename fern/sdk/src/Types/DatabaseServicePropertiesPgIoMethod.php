<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgIoMethod: string
{
    case Worker = "worker";
    case Sync = "sync";
    case IoUring = "io_uring";
}
