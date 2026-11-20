<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogLevel: string
{
    case Debug = "debug";
    case Info = "info";
    case Trace = "trace";
    case Warn = "warn";
}
