<?php

namespace Upcloud\Types;

enum PlanFamily: string
{
    case GeneralPurpose = "general_purpose";
    case Developer = "developer";
    case CloudNative = "cloud_native";
    case Gpu = "gpu";
    case Starter = "starter";
    case Premium = "premium";
}
