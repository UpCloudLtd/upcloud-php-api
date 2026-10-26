<?php

namespace Upcloud\Types;

enum ServerStorageDevicesStorageDeviceItemAction: string
{
    case Create = "create";
    case Clone_ = "clone";
    case Attach = "attach";
}
