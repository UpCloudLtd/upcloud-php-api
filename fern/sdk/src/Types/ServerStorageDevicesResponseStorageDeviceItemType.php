<?php

namespace Upcloud\Types;

enum ServerStorageDevicesResponseStorageDeviceItemType: string
{
    case Disk = "disk";
    case Cdrom = "cdrom";
}
