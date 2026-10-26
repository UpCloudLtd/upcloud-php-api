<?php

namespace Upcloud\Storage\Types;

enum AttachStorageRequestStorageDeviceType: string
{
    case Disk = "disk";
    case Cdrom = "cdrom";
}
