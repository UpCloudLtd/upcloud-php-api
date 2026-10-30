<?php

namespace Upcloud\Server\Types;

enum ServerAttachStorageStorageDeviceType: string
{
    case Disk = "disk";
    case Cdrom = "cdrom";
}
