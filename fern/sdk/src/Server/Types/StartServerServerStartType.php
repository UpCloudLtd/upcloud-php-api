<?php

namespace Upcloud\Server\Types;

enum StartServerServerStartType: string
{
    case Sync = "sync";
    case Async = "async";
}
