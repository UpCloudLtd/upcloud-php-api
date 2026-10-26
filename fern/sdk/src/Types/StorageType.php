<?php

namespace Upcloud\Types;

enum StorageType: string
{
    case Normal = "normal";
    case Template = "template";
    case Cdrom = "cdrom";
    case Backup = "backup";
}
