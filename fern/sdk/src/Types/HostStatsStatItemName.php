<?php

namespace Upcloud\Types;

enum HostStatsStatItemName: string
{
    case CpuIdle = "cpu_idle";
    case MemoryFree = "memory_free";
}
