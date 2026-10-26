<?php

namespace Upcloud\Server\Types;

enum GetDiskStatsRequestType: string
{
    case Bytes = "bytes";
    case Requests = "requests";
}
