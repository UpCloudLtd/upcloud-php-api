<?php

namespace Upcloud\Server\Types;

enum ListServersRequestSortBy: string
{
    case Title = "title";
    case Zone = "zone";
    case Size = "size";
    case Cores = "cores";
    case Memory = "memory";
    case Popularity = "popularity";
}
