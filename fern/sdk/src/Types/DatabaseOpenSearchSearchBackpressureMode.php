<?php

namespace Upcloud\Types;

enum DatabaseOpenSearchSearchBackpressureMode: string
{
    case MonitorOnly = "monitor_only";
    case Enforced = "enforced";
    case Disabled = "disabled";
}
