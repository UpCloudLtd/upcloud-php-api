<?php

namespace Upcloud\Types;

enum ContainerRegistryPermissionsItem: string
{
    case Read = "read";
    case Create = "create";
    case Update = "update";
    case Delete = "delete";
}
