<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesOpensearchSearchBackpressureMode: string
{
    case MonitorOnly = "monitor_only";
    case Enforced = "enforced";
    case Disabled = "disabled";
}
