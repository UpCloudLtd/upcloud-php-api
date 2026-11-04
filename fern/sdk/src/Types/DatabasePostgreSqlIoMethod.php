<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlIoMethod: string
{
    case Worker = "worker";
    case Sync = "sync";
    case IoUring = "io_uring";
}
