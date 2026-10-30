<?php

namespace Upcloud\Types;

enum StorageAccessFilter: string
{
    case Public_ = "public";
    case Private_ = "private";
}
