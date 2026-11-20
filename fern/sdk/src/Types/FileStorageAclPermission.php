<?php

namespace Upcloud\Types;

enum FileStorageAclPermission: string
{
    case Ro = "ro";
    case Rw = "rw";
}
