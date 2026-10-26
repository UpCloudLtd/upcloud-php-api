<?php

namespace Upcloud\Types;

enum StorageTier: string
{
    case Hdd = "hdd";
    case Standard = "standard";
    case Maxiops = "maxiops";
}
