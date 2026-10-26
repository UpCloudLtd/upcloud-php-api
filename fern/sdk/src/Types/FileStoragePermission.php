<?php

namespace Upcloud\Types;

enum FileStoragePermission: string
{
    case Ro = "ro";
    case Rw = "rw";
}
