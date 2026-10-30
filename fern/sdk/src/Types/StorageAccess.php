<?php

namespace Upcloud\Types;

enum StorageAccess: string
{
    case Public_ = "public";
    case Private_ = "private";
    case Utility = "utility";
}
