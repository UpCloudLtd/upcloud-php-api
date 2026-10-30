<?php

namespace Upcloud\Types;

enum StorageSortBy: string
{
    case Created = "created";
    case Size = "size";
    case Tier = "tier";
    case Title = "title";
    case Type = "type";
    case Zone = "zone";
}
