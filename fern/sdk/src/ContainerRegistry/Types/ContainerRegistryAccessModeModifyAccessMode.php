<?php

namespace Upcloud\ContainerRegistry\Types;

enum ContainerRegistryAccessModeModifyAccessMode: string
{
    case Public_ = "public";
    case Private_ = "private";
    case Dual = "dual";
}
