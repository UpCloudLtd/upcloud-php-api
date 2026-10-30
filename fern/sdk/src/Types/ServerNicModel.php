<?php

namespace Upcloud\Types;

enum ServerNicModel: string
{
    case Virtio = "virtio";
    case E1000 = "e1000";
    case Rtl8139 = "rtl8139";
}
