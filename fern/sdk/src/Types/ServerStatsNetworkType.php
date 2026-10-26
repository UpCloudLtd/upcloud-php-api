<?php

namespace Upcloud\Types;

enum ServerStatsNetworkType: string
{
    case Bytes = "bytes";
    case Packets = "packets";
}
