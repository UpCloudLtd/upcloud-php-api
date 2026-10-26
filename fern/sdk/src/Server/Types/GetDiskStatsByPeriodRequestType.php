<?php

namespace Upcloud\Server\Types;

enum GetDiskStatsByPeriodRequestType: string
{
    case Bytes = "bytes";
    case Requests = "requests";
}
