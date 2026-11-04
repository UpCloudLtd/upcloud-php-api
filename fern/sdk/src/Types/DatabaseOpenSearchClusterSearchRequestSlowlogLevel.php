<?php

namespace Upcloud\Types;

enum DatabaseOpenSearchClusterSearchRequestSlowlogLevel: string
{
    case Debug = "debug";
    case Info = "info";
    case Trace = "trace";
    case Warn = "warn";
}
