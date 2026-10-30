<?php

namespace Upcloud\Types;

enum StorageTemplateType: string
{
    case CloudInit = "cloud-init";
    case Native = "native";
}
