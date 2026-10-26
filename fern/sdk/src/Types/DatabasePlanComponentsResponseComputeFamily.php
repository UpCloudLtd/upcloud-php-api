<?php

namespace Upcloud\Types;

enum DatabasePlanComponentsResponseComputeFamily: string
{
    case Development = "development";
    case Standard = "standard";
    case Memory = "memory";
}
