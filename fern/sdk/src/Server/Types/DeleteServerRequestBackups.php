<?php

namespace Upcloud\Server\Types;

enum DeleteServerRequestBackups: string
{
    case Keep = "keep";
    case KeepLatest = "keep_latest";
    case Delete = "delete";
}
